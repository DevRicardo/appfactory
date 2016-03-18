   <div class="row">

    <table class='responsive-table'>
        <thead><tr><th data-field='id'>#</th><th data-field=''titulo''>Titulo</th><th data-field=''autor''>Autor</th><th data-field=''etert''>Etert</th><th data-field=''></th></tr></thead><tbody>
        <?php $count = 1;?>
        @foreach ($books as $key => $book)<tr>
           <td>{!! $count !!}</td>   
        <td data-field=''titulo''>{!! $book->titulo !!}</th><td data-field=''autor''>{!! $book->autor !!}</th><td data-field=''etert''>{!! $book->etert !!}</th></tr>
        <?php $count++;?>
        @endforeach
        </tbody>
         
        </table> 

    </div>
    <div>
        {!! $books->appends(['sort' => 'votes'])->links() !!}  
    </div>
