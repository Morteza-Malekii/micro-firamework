<?php

namespace App\Models\Contracts;

class JsonModel extends BaseModel
{
    private $jsonFolder;
    private $jsonPath;

    public function __construct()
    {
        $this->jsonFolder = BASEPATH . "storage/jsondb/";
        $this->jsonPath = $this->jsonFolder . $this->table . ".json";
    }

    public function create(array $data): int
    {
        $tableData = $this->readJson();
        $tableData []=$data;
        $this->writeJson($tableData);
        return 1;
    }
    
    public function readJson() :array
    {
        if (!file_exists($this->jsonPath))
        {
            file_put_contents($this->jsonPath,json_encode([]));
        }
        $tableData = file_get_contents($this->jsonPath);
        if(empty($tableData))
            return [];
        return json_decode($tableData);
    }

    public function writeJson(array $tableData)
    {
        $jsonTableNewData = json_encode($tableData);
        file_put_contents($this->jsonPath,$jsonTableNewData);
    }

    public function find($id): object
    {
        $tableData = $this->readJson();
        foreach ($tableData as $row)
        {
            if ($row->{$this->primarykey} == $id)
            return $row;
        }
        return (object)[];
    }

    function get(array $data, array $conditions): array {
        return array_filter($data,function($item) use ($conditions) {
            foreach ($conditions as $key => $value) {
                if (!property_exists($item, $key) || $item->$key !== $value) {
                    return false;
                }
            }
            return true;
        });
    }

    public function update(array $newdata ,array $where): int
    {
        $tableData = $this->readJson();
        $updated = 0;
        foreach ($tableData as $item)
        {
            $matches = true;
            foreach($where as $key=>$value)
            {
                if (!property_exists($item , $key) || ($item->$key !== $value))
                $matches = false;
                break;
            }
            if($matches == true)
            {
                foreach($newdata as $k=>$v)
                {
                    $item->$k = $v;
                }
            }
            $updated++;
        }
        $this->writeJson($tableData);
        return $updated;
    }

    public function delete(array $where): int
    {
        $tableData = $this->readJson();
        $beforeCOunt = count($tableData);
        $tableData = array_filter($tableData,function($item) use($where){
            foreach($where as $key=>$value)
            {
                if (!property_exists($item , $key) || ($item->$key !== $value))
                return true;
                break;
            }
            return false;
        });
        $this->writeJson(array_values($tableData));
        return $beforeCOunt - count($tableData);
    }
}