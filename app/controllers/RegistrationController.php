<?php

use Acme\Forms\RegistrationForm;

class RegistrationController extends \BaseController
{


    /**
     * @var RegistrationForm
     */
    private $registrationFom;

    function __construct(RegistrationForm $registrationFom)
    {

        $this->registrationFom = $registrationFom;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(Auth::check()){
            return Redirect::home();
        }
        return View::make('registration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::only('username', 'email', 'password');

        $this->registrationFom->validate(Input::all());

        $user = User::create($input);

        Auth::login($user);

        return Redirect::home();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}