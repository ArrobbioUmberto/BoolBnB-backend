@extends('layouts.app')

@section('content')

    <div class="container pt-3">
        <h1>ELenco degli appartamenti</h1>
    </div>

    <div class="container py-5">
        <table class="table table-striped table-inverse table-responsive">
            <thead>
                <tr>
                    <th>Titolo</th>
                    <th>Città</th>
                    <th>Indirizzo</th>
                    <th>Prezzo</th>
                    <th>Metri quadrati</th>
                    <th>N. stanze</th>
                    <th>N. letti</th>
                    <th>N. bagni</th>
                    <th>Visibilità</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Casa al mare</td>
                    <td>San Teodoro</td>
                    <td>via ho voglia di mare 10</td>
                    <td>120&euro;</td>
                    <td>80 &#13217;</td>
                    <td>6</td>
                    <td>2</td>
                    <td>1</td>
                    <td>privata</td>
                </tr>
            </tbody>
        </table>
    </div>
    
@endsection