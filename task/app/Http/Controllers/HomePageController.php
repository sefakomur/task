<?php

namespace App\Http\Controllers;


use App\Repositories\UserRepository;
use App\Repositories\UserTypeRepository;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function __construct(UserRepository $userRepository,
                                UserTypeRepository $userTypeRepository)
    {
        $this->userRepo = $userRepository;
        $this->userTypeRepo = $userTypeRepository;

    }

    public function index()
    {

        $getUserList = $this->userRepo->getUserList();
       $getUserTypeList =  $this->userTypeRepo->getUserTypeList();
        return view('homepage.index')->with(['getUserTypeList'=>$getUserTypeList,'getUserList'=>$getUserList]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $this->userRepo->save($request);

        return redirect()->back()->with('message','Succesful');

    }

    public function show($id)
    {
     return $this->userRepo->getUserListId($id);


    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $this->userRepo->delete($id);

        return redirect()->back()->with('message','Succesful');
    }
}
