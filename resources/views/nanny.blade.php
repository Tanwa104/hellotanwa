@extends('layout.master')
@section('container')
<div class="container-xxl bg-white p-0">
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container my-5 py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-3 text-white animated slideInLeft">Karvae<br>Ghar ki seva</h1>
                    <p class="text-white animated slideInLeft mb-4 pb-2">Your everyday needs, expertly handled.
                        Home services, simplified. Connecting you with top-rated pros. Get things done, the easy way.
                        Trusted professionals, at your service.</p>

                </div>
                <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                    <img class="img-fluid" src="img/hero.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Enter</h5>
                <h1 class="mb-5">The given details</h1>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">


                        
                    </div>
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
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