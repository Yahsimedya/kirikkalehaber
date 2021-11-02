{{-- @if ($paginator->hasPages())
    <ul class="pager">

        @if ($paginator->onFirstPage())
            <li class="disabled"><span>← Previous</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
        @else
            <li class="disabled"><span>Next →</span></li>
        @endif
    </ul>
@endif --}}

@if ($paginator->hasPages())

<div class="dataTables_paginate paging_simple_numbers pagination" >
     @if ($paginator->onFirstPage())
     <a href="#" class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" id="DataTables_Table_0_previous">←</a>
     @else
     <a  href="{{ $paginator->previousPageUrl() }}" class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" id="DataTables_Table_0_previous">←</a>

        @endif



        @foreach ($elements as $element)

        @if (is_string($element))
            <li class="disabled"><span>{{ $element }}</span></li>
        @endif



        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <span><a class="paginate_button current active" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">{{ $page }}</a></span>

                    {{-- <li class="active my-active"><span>{{ $page }}</span></li> --}}
                @else
                <span><a class="paginate_button " aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" href="{{ $url }}">{{ $page }}</a></span>

                {{-- <span><a class="paginate_button current" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">{{ $url }}">{{ $page }}</a></span> --}}

                    {{-- <li><a href="{{ $url }}">{{ $page }}</a></li> --}}
                @endif
            @endforeach
        @endif
    @endforeach






    @if ($paginator->hasMorePages())
    {{-- <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li> --}}
    <a  href="{{ $paginator->nextPageUrl() }}" class="paginate_button next disabled" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" id="DataTables_Table_0_next">→</a>

@else
<a class="paginate_button next disabled" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" id="DataTables_Table_0_next">→</a>

@endif
</div>
@endif
{{-- <script type="text/javascript">
    // $(document).ready(function () {
    //         $('#DataTables_Table_0_paginate').dataTable({
    //             "paging": false
    //         });
    //     });
    //     <script>
$(document).ready(function() {
    $(document).ready(function() {
    $('#kategori').DataTable( {
        "paging":   false,
        "info":   false,

    } );
} );
});
</script> --}}
