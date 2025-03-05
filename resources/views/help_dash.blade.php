@extends('layout.master')  
@section('container')  
<div class="container-xxl py-5 bg-dark hero-header mb-5">  
    <div class="container text-center my-5 pt-5 pb-4">  
        <h1 class="display-3 text-white mb-3 animated slideInDown">Kare Ghar ki Seva</h1>  
        <nav aria-label="breadcrumb">  
            <ol class="breadcrumb justify-content-center text-uppercase">  
                
            </ol>  
        </nav>  
    </div>  
</div>  

<div class="container-xxl pt-5 pb-3">  
    <div class="container">  
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">  
            <h5 class="section-title ff-secondary text-center text-primary fw-bold" style="font-size: 24px; margin-bottom: 20px;">Things to Do</h5>  
        </div>  
        <div class="row g-4 justify-content-center">  
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">  
                <div class="team-item text-center rounded shadow-sm p-3" style="background-color: #ffffff; transition: transform 0.3s; border-radius: 15px;">  
                    <div class="rounded-circle overflow-hidden m-4" style="width: 150px; height: 150px; margin: 20px auto;">  
                        <form action="{{ route('cleanhelper.build') }}" method="get">  
                            <button type="submit" style="background: none; border: none; padding: 0;">  
                                <img class="img-fluid" src="/img/findnewclient.jpg" alt="Find New Clients" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%; transition: transform 0.3s;">  
                            </button>  
                        </form>  
                    </div>  
                    <h5 class="mb-0">Find New Clients</h5>  
                    <small class="text-muted">Expand Your Reach</small>  
                </div>  
            </div>  
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">  
                <div class="team-item text-center rounded shadow-sm p-3" style="background-color: #ffffff; transition: transform 0.3s; border-radius: 15px;">  
                    <div class="rounded-circle overflow-hidden m-4" style="width: 150px; height: 150px; margin: 20px auto;">  
                        <form action="{{ route('bookhelp.fill') }}" method="get">  
                            <button type="submit" style="background: none; border: none; padding: 0;">  
                                <img class="img-fluid" src="/img/accept.jpg" alt="Accept Clients" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%; transition: transform 0.3s;">  
                            </button>  
                        </form>  
                    </div>  
                    <h5 class="mb-0">Accept Clients</h5>  
                    <small class="text-muted">Manage Bookings</small>  
                </div>  
            </div>  
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">  
                <div class="team-item text-center rounded shadow-sm p-3" style="background-color: #ffffff; transition: transform 0.3s; border-radius: 15px;">  
                    <div class="rounded-circle overflow-hidden m-4" style="width: 150px; height: 150px; margin: 20px auto;">  
                        <form action="{{ route('rate.see') }}" method="get">  
                            <button type="submit" style="background: none; border: none; padding: 0;">  
                                <img class="img-fluid" src="/img/reviews.jpg" alt="View Ratings" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%; transition: transform 0.3s;">  
                            </button>  
                        </form>  
                    </div>  
                    <h5 class="mb-0">View Ratings</h5>  
                    <small class="text-muted">See Your Reviews</small>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  

<script>  
    // Optional: Add hover effects using JavaScript to scale items when mouse enters  
    document.querySelectorAll('.team-item').forEach(item => {  
        item.addEventListener('mouseenter', () => {  
            item.style.transform = 'scale(1.05)'; // Slightly enlarge item  
        });  
        item.addEventListener('mouseleave', () => {  
            item.style.transform = 'scale(1)'; // Reset size  
        });  
    });  
</script>  

@endsection  