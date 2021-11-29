<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlayerController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //

        $players = Player::all();

        return view('players.index', ['players' => $players]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        //
        return view('players.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|min:3',
            'surname' => 'required',
            'phone' => 'required',
            'street' => 'required',
            'email' => 'required'
        ]);

        $player = new Player($request->input());
        $player->photo = $this->uploadPhoto($request);

        $player->save();

        return redirect()->route('players.index')->with('success', 'Jugador creado satisfactoriamente');
    }

    private function uploadPhoto(Request $request)
    {
        $photo = $request->file("photo");
        $photoName = Str::slug($request->name) . "." . $photo->guessExtension();
        $route = public_path("img/");

        copy($photo->getRealPath(), $route . $photoName);

        return $photoName;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
        //
        $player = Player::find($id);
        return view('players.create', ['player' => $player, 'readonly' => 'readonly']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        //
        $player = Player::find($id);
        return view('players.create', ['player' => $player]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //
        $player = Player::find($id);
        $player->dni = $request->dni;
        $player->name = $request->name;
        $player->surname = $request->surname;
        $player->phone = $request->phone;
        $player->street = $request->street;
        $player->email = $request->email;

        if($request->hasFile('photo'))
            $player->photo = $this->uploadPhoto($request);

        $player->save();

        return redirect()->route('players.index')->with('success', 'Jugador actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //
        $player = Player::find($id);

        $player->delete();
        return redirect()->route('players.index')->with('success', 'Jugador borrado satisfactoriamente');
    }
}
