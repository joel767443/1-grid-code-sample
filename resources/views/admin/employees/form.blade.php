<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>{{ $formTitle }}</h5>
            <div class="ibox-tools">
                <a href="{{ route('employees') }}"><i class="fa fa-home fa-2x text-success"></i></a>
            </div>
        </div>
        <div class="ibox-content">
            <form class="form-horizontal">
                <p>&nbsp;</p>
                <div class="form-group"><label class="col-lg-2 control-label">Email</label>

                    <div class="col-lg-10"><input type="email" placeholder="Email" class="form-control"> <span class="help-block m-b-none">Example block-level help text here.</span>
                    </div>
                </div>
                <div class="form-group"><label class="col-lg-2 control-label">Password</label>

                    <div class="col-lg-10"><input type="password" placeholder="Password" class="form-control"></div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <div class="i-checks"><label> <input type="checkbox"><i></i> Remember me </label></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-sm btn-white" type="submit">Sign in</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
