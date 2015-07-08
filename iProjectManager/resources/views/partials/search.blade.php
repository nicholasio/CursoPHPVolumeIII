<div class="box-tools">

    <div class="input-group">
        <form action="" method="get" >
            <input type="text" placeholder="Search" style="width: 150px;"
                   class="form-control input-sm pull-right" name="search" value="@if (isset($search)){{ $search }}@endif">

            <div class="input-group-btn">
                <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
</div>