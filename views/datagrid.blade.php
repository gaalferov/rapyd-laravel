<div class="rpd-datagrid">
    @include('rapyd::toolbar', array('label'=>$label, 'buttons_right'=>$buttons['TR']))


    <table{!! $dg->buildAttributes() !!}>
        <thead>
        <tr>
            @foreach ($dg->columns as $column)
                <th{!! $column->buildAttributes() !!}>
                    @if ($column->orderby)
                        @if ($dg->onOrderby($column->orderby_field, 'desc'))
                            <a href="{{ $dg->orderbyLink($column->orderby_field,'asc') }}">
                                <i class="fa fa-sort-amount-desc"></i>
                                {!! $column->label !!}
                            </a>
                        @elseif ($dg->onOrderby($column->orderby_field, 'asc'))
                            <a href="{{ $dg->orderbyLink($column->orderby_field,'desc') }}">
                                <i class="fa fa-sort-amount-asc"></i>
                                {!! $column->label !!}
                            </a>
                        @else
                            <a href="{{ $dg->orderbyLink($column->orderby_field,'desc') }}">
                                <i class="fa fa-sort-amount-asc"></i>
                                {!! $column->label !!}
                            </a>
                        @endif
                    @else
                        {!! $column->label !!}
                    @endif

                </th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @if (count($dg->rows) == 0)
            <tr>
                <td colspan="{!! count($dg->columns) !!}">{!! trans('rapyd::rapyd.no_records') !!}</td>
            </tr>
        @endif
        @foreach ($dg->rows as $row)
            <tr{!! $row->buildAttributes() !!}>
                @foreach ($row->cells as $cell)
                    <td{!! $cell->buildAttributes() !!}>{!! $cell->value !!}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>


    <div class="btn-toolbar" role="toolbar">
        @if ($dg->havePagination())
            <div class="pull-left">
                {!! $dg->links() !!}
            </div>
            <div class="pull-right">
                {!! $dg->totalRows() !!}
            </div>
        @endif
    </div>
</div>

