<html>
      <body>
         <form action='' method='post'>
              @csrf
                      @if($errors->any())
              <ul>
             @foreach($errors->all() as $error)
            <li> {{ $error }} </li>
             @endforeach
        @endif

        @if( session( 'success' ) )
             {{ session( 'success' ) }}
        @endif

             <label>Phone numbers (seperate with a comma [7,0,6,9,2,2,4,7,5,3])</label>
             <input type='text' name='numbers' />

            <label>Message</label>
            <textarea name='message'></textarea>

            <button type='submit'>Send!</button>
      </form>
    </body>
</html>