<?php

namespace App\Controllers\Api;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ClientsModel;
use App\Traits\HasFilters;

class ClientsApi extends ResourceController
{

    use HasFilters;

    protected $model;
    protected $format = 'json';

    public function __construct(){
        $this->model = new ClientsModel(); // Membuat instance dari model ClientsModel
    }

    /**
     * Return an array of resource objects, themselves in array format.
     * php spark make:controller Api/ClientsApi --restful
     *
     * @return ResponseInterface
     */
    public function index()
    {
        try{
            $params = $this->request->getGet();

            $whereParams = ['id']; // Tentukan parameter yang diizinkan
            $filteredParams = array_intersect_key($params, array_flip($whereParams));

            $likesParams = ['name', 'email']; // Tentukan parameter yang diizinkan
            $likedParams = array_intersect_key($params, array_flip($likesParams));

            $wheres = $this->loopWhere($filteredParams);
            $likes = $this->loopLikes($likedParams);

            // Eksekusi kueri sekali dan simpan hasilnya dalam variabel
            $query = $this->model->where($wheres)->like($likes);

            // Hitung total hasil dengan kueri yang sama
            $totalResults = $query->countAllResults(false);

            // Ambil data halaman menggunakan kueri yang sama
            $dataPerPage = $query->paginate(5);

            $data = [
                'message' => 'Data clients ditampilkan',
                'count' => $totalResults,
                'data' => $dataPerPage
            ];

            return $this->respond($data, 200);

        }catch(\Exception $e){
            return $this->fail(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }

}
