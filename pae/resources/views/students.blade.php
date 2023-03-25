@extends('template')

@section('maintitle','Liste des Etudiants')

@section('content')

    <div class="form-group">
        <label for="exampleSelect1" class="form-label mt-4" >Veuillez choisir un Etudiant...</label>
        <select class="form-select" id="exampleSelect1" onchange="myFunction()">
            <option disabled selected value> -- Liste des Etudiants -- </option>
            @foreach ($allStudents as $student)
            <option value="{{$student->matricule}}">{{$student->nom .'-'.$student->total}}</option>
            @endforeach
        </select>
    </div>

    <div id="test">

    </div>

@endsection
