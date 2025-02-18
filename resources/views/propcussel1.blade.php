<html>
  <head><title>Select type of job</title></head>
  <body>
    <div style="margin-left:45%;">
      <form action="{{ route('propuser.build') }}" method="get">
          <input type="hidden" id="role" name="role" value="Housecleaner">
          <input type="image" src="/img/cleaning.png" alt="Submit"
              width="48" height="48" >
      </form>house clean<br>
      <form action="{{ route('propuser.build') }}" method="get">
          <input type="hidden" id="role" name="role" value="childcare">
           <input type="image" src="/img/nanny.png" alt="Submit"
              width="48" height="48">
      </form>childcare<br>
      <form action="{{ route('propuser.build') }}" method="get">
          <input type="hidden" id="role" name="role" value="houseCook">
          <input type="image" src="/img/cook.png" alt="Submit"
              width="48" height="48">
      </form>cook
    </div></body></html>