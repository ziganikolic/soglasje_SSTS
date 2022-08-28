<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContractStatusRequest;
use App\Http\Requests\UpdateContractStatusRequest;
use App\Http\Resources\ContractStatusResource;
use App\Http\Resources\StanjeSoglasjaResource;
use App\Models\ContractStatus;
use App\Models\User;
use Illuminate\Http\Request;

class ContractStatusController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreContractStatusRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategorije = array(1, 1, 1, 1, 1, 1,
            2, 2, 2, 2, 2, 2,
            3, 3, 3, 3, 3, 3,
            4, 4, 4, 4, 4, 4,
            5, 5, 5, 5, 5, 5,
            6, 6, 6, 6, 6, 6,
            7, 7, 7, 7, 7, 7,
            8, 8, 8, 8, 8, 8,
            9,
            10, 10,
            11, 11, 11, 11);
        $privolitev = $request->text;

        $id = $request->user_id;


        $privolitev_list = [];

        foreach ($privolitev as $item) {
            foreach ($item as $a) {
                if ($a == 1 || $a === true || $a === "true") {
                    $a = 1;
                    // print_r($a);
                } else if ($a === null || $a === "null" || $a === false || $a === 0) {
                    $a = 0;
                    // print_r($a);
                }

                array_push($privolitev_list, $a);
            }
        }


        for ($i = 0; $i < count($privolitev_list); $i++) {
            $datasave = new ContractStatus();
            $datasave->user_id = $id;
            $datasave->permission_id = $i + 1;
            $datasave->choice = $privolitev_list[$i];
            $datasave->category_id = $kategorije[$i];
            // $datasave->data = serialize($data);
            $datasave->save();
        }
        return response()->json([
            "message" => "Privolitev je poslana"
        ], 201);


        // return stanje_soglasja::create($request->all());

        //Za potrebe validacije
        // $request->validate([
        //     'user_id' => 'required'
        // ]);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ContractStatus $contractStatus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $user = user::query()
//            ->where('id', [$id])
//            ->with('contractStatus')
//            ->get();

        $user = user::with('contractStatus')->where('id', [$id])->get();

        return ContractStatusResource::collection(compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ContractStatus $contractStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(ContractStatus $contractStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateContractStatusRequest $request
     * @param \App\Models\ContractStatus $contractStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContractStatusRequest $request, ContractStatus $contractStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ContractStatus $contractStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contract = ContractStatus::query()
            ->where('user_id', [$id])
            ->delete('contractStatus');


        return response()->json([
            "message" => "Uporabniki so izbrisani"
        ], 201);

    }
}
