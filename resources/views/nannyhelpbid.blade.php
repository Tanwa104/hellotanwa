@extends('layout.master')
@section('container')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">See request</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">

                </ol>
            </nav>
        </div>
    </div>
    @php

    @endphp
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        City and area filter
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">city and area filter</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="GET" action="{{ route('area.fill') }}">
                        <div>
                            <div class="text-center">
                                <div class="form-group mb-3">

                                    <select  id="country-dropdown" class="form-control">
            
                                        <option value="">-- Select City --</option>
            
                                        @foreach ($data as $dat)
            
                                        <option value="{{$dat}}">
            
                                            {{$dat}}
            
                                        </option>
            
                                        @endforeach
            
                                    </select>
            
                                </div>
                                
                                <label for="textbox-count">Enter the number of areas: </label>
                                <input type="number" name="textbox-count" id="textbox-count" min="1"
                                    placeholder="Number of textboxes"><br><br>
                                <button onclick="addTextboxes()">Enter areas</button><br><br>

                                <div id="textbox-container" class="textbox-container"></div><br><br>

                                <input type="submit" value="submit" />
                            </div>
                        </div>
                        <script>
                            function addTextboxes() {
                                // Get the number of textboxes to create
                                event.preventDefault();
                                const count = document.getElementById('textbox-count').value;
                                const container = document.getElementById('textbox-container');

                                // Clear the container before adding new textboxes
                                container.innerHTML = '';

                                // Add the specified number of textboxes
                                for (let i = 0; i < count; i++) {
                                    const input = document.createElement('input');
                                    input.type = 'text';
                                    input.name = `city[${i}]`;
                                    input.placeholder = `please enter correct name`;
                                    container.appendChild(input);
                                    container.appendChild(document.createElement('br')); // Adding line breaks for better layout
                                }
                            }
                        </script>

                        <div></div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    @php
        $las = session()->get('data');
        $n = count($users);
        $no = count($usernanny);
        

    @endphp
    @if ($las != null)
       
       @php
           $noi=count($las);
       @endphp
        @for ($i = 0; $i < $n; $i++)
          
                @for ($j = 0; $j < $noi; $j++)
                @if ($useradd[$i]->city == $las[$j]->address->city)
                    @if ($las[$j]->address->area == $useradd[$i]->area)
                        <div class="card text-center">
                            <div class="card-header">
                                Find Assistence
                            </div>
                            <div class="card-body">
                               
                                <h5 class="card-title">{{ $users[$i]->name }}&nbsp;{{ $users[$i]->lastname }}</h5>
                                <p>{{ $useradd[$i]->address_line_1 }}&nbsp;{{ $useradd[$i]->address_line_2 }}&nbsp;{{ $useradd[$i]->area }}&nbsp;{{ $useradd[$i]->city }}&nbsp;{{ $useradd[$i]->state }}
                                </p>
                                {{ \Carbon\Carbon::parse($usertime[$i]->start_time)->format('g:i A') }}&nbsp;to&nbsp;{{ \Carbon\Carbon::parse($usertime[$i]->end_time)->format('g:i A') }}<br>
                                <p class="card-text">{{ $usertime[$i]->weekdays }}</p>
                                <table border class="card-text">
                                    <tr>
                                        <th>childname</th>
                                        <th>age</th>
                                        <th>gender</th>
                                    </tr>

                                    @php
                                        $no = count($usernanny[$usertime[$i]->id]);
                                    @endphp
                                    @for ($j = 0; $j < $no; $j++)
                                        <tr>
                                            <td>{{ $usernanny[$usertime[$i]->id][$j]->childname }}</td>
                                            <td>{{ $usernanny[$usertime[$i]->id][$j]->childage }}</td>
                                            <td>{{ $usernanny[$usertime[$i]->id][$j]->childgender }}</td>
                                        </tr>
                                    @endfor
                                </table>
                                <a href="#" class="btn btn-primary">book</a>
                            </div>
                            <div class="card-footer text-body-secondary">
                                <a
                                    href="{{ route('propindex.build', ['id' => $users[$i]->id, 'tid' => $usertime[$i]->id]) }}">make
                                    proposal</a>
                            </div>
                        </div><br><br>
                    @endif
                    @endif
                @endfor
            
        @endfor
    @endif
    @if ($las == null)
        @for ($i = 0; $i < $n; $i++)
            <div class="card text-center">
                <div class="card-header">
                    Find Assistence
                </div>
                <div class="card-body">

                    <h5 class="card-title">{{ $users[$i]->name }}&nbsp;{{ $users[$i]->lastname }}</h5>
                    <p>{{ $useradd[$i]->address_line_1 }}&nbsp;{{ $useradd[$i]->address_line_2 }}&nbsp;{{ $useradd[$i]->area }}&nbsp;{{ $useradd[$i]->city }}&nbsp;{{ $useradd[$i]->state }}
                    </p>
                    {{ \Carbon\Carbon::parse($usertime[$i]->start_time)->format('g:i A') }}&nbsp;to&nbsp;{{ \Carbon\Carbon::parse($usertime[$i]->end_time)->format('g:i A') }}<br>
                    <p class="card-text">{{ $usertime[$i]->weekdays }}</p>
                    <table border class="card-text">
                        <tr>
                            <th>childname</th>
                            <th>age</th>
                            <th>gender</th>
                        </tr>

                        @php
                            $no = count($usernanny[$usertime[$i]->id]);
                        @endphp
                        @for ($j = 0; $j < $no; $j++)
                            <tr>
                                <td>{{ $usernanny[$usertime[$i]->id][$j]->childname }}</td>
                                <td>{{ $usernanny[$usertime[$i]->id][$j]->childage }}</td>
                                <td>{{ $usernanny[$usertime[$i]->id][$j]->childgender }}</td>
                            </tr>
                        @endfor
                    </table>
                    <a href="#" class="btn btn-primary">book</a>
                </div>
                <div class="card-footer text-body-secondary">
                    <a href="{{ route('propindex.build', ['id' => $users[$i]->id, 'tid' => $usertime[$i]->id]) }}">make
                        proposal</a>
                </div>
            </div><br><br>
        @endfor
    @endif
@endsection
