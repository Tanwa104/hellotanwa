<footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>GruhSeva</span></strong>. All Rights Reserved
    </div>
    <a href="{{route('admin.reports')}}" class="btn btn-primary">Reports</a>
   
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-primary" style="margin-left:90%">Logout</button>
        </form>
   
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
     
  </footer><!-- End Footer -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  