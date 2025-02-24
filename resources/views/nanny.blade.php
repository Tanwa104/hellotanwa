@extends('layout.master')
@section('container')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Enter the details given</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                
            </ol>
        </nav>
    </div>
</div>
    <div class="container-xxl py-5">
        <div class="container">
           
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">


                        
                    </div>
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <img class="position-relative rounded w-100 h-100" src="/img/childlook.jpg" alt="Map Placeholder" style="min-height: 350px; object-fit: cover;">
                    </div>
                <div class="col-md-6">
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

                    <form method="get" action="{{ route('udnanny.build') }}">
                        @csrf
                        <label for="childno" class="form-label">Enter the number of children</label>
                        <input type="number" name="childno" id="childno" class="form-control mb-3" min="1" required/>
                        <div id="container"></div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>

                    <script>
                        document.getElementById('childno').addEventListener('input', function() {
                            const numberOfChildren = parseInt(this.value) || 0;
                            const container = document.getElementById('container');
                            container.innerHTML = '';

                            const maxChildren = 10;
                            if (numberOfChildren > maxChildren) {
                                alert("Maximum " + maxChildren + " children allowed.");
                                this.value = maxChildren;
                                numberOfChildren = maxChildren;
                            }

                            for (let i = 0; i < numberOfChildren; i++) {
                                const childDiv = document.createElement('div');
                                childDiv.innerHTML = `
                                    <input type="text" name="Name[]" class="form-control mb-2" placeholder="Child ${i + 1} Name" required>
                                    <input type="number" name="Age[]" class="form-control mb-2" placeholder="Child ${i + 1} Age" required>
                                    <select name="Gender[]" class="form-control mb-2" required>
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>`;
                                container.appendChild(childDiv);
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection