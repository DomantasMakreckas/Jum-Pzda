<?php

class FileDB
{
    private $file_name;
    private $data;

    /**
     * sukuria nauja objekta
     * FileDB constructor.
     * @param $file_name
     */
    public function __construct(string $file_name)
    {
        $this->file_name = $file_name;
    }

    /**
     * data variable padaro masyvu
     * (neissaugo)
     * @param $data_array
     */
    public function setData(array $data_array): void
    {
        $this->data = $data_array;
    }

    /**
     * Issaugo masyva i faila
     * @return bool
     */
    public function save(): bool
    {
        $string = json_encode($this->data);
        $bytes_written = file_put_contents($this->file_name, $string);

        if ($bytes_written !== false) {
            return true;
        }
        return false;
    }

    /**
     * Jeigu egzistuoja failas is jo esamos info padaro masyva
     */
    public function load(): void
    {
        if (file_exists($this->file_name)) {
            $data = file_get_contents($this->file_name);
            if ($data !== false) {
                $this->data = json_decode($data, true);
            }
        } else {
            $this->data = [];
        }
    }

    /**
     * grazina masyva
     * @return mixed
     */
    public function getData(): ?array
    {
        return $this->data;
    }


    /** Metodas kuris sukuria tuscia table array, jei toks neegzistuoja
     * @param $table_name
     * @return bool
     */
    public function createTable($table_name)
    {
        if (!$this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        }

        return false;
    }

    /**
     * Metodas, patikrina ar egzistuoja table tokiu pavadinimu
     * @param string $table_name
     * @return bool
     */
    public function tableExists(string $table_name): bool
    {
        if (isset($this->data[$table_name])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * F-ija kuri istrina table kartu su indeksu
     * @param string $table_name
     * @return bool
     */
    public function dropTable(string $table_name): bool
    {
        if ($this->tableExists($table_name)) {
            unset($this->data[$table_name]);
            return true;
        }

        return false;
    }

    /**
     * F-ija kuri istustina masyva bet jo neistrina
     * @param string $table_name
     * @return bool
     */
    public function truncateTable(string $table_name): bool
    {
        if ($this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        }

        return false;
    }


    /**
     * F-ija pridedanti viena eilute su automatiniu indeksu arba musu parasytu
     * @param string $table_name
     * @param array $row
     * @param null $row_id
     * @return bool|mixed|null
     */
    public function insertRow(string $table_name, array $row, $row_id = null)
    {
        if ($row_id == null) {
            $this->data[$table_name][] = $row;
            return array_key_last($this->data[$table_name]);
        } elseif (!isset($this->data[$table_name][$row_id])) {
            $this->data[$table_name][$row_id] = $row;
            return $row_id;
        }

        return false;
    }

}