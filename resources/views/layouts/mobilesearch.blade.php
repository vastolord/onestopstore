
<style>

.search-form .form-group {
  float: right !important;
  transition: all 0.35s, border-radius 0s;
  margin: 9px;
  width: 90px;
  height: 32px;
  background-color: #fff;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
  border-radius: 10px;
  border: 1px solid #ccc;
}
.search-form .form-group input.form-control {
  padding-top: 4px;  
  padding-right: 20px;
  border: 0 none;
  background: transparent;
  box-shadow: none;
  display:block;
}
.search-form .form-group input.form-control::-webkit-input-placeholder {
  display: none;
}
.search-form .form-group input.form-control:-moz-placeholder {
  /* Firefox 18- */
  display: none;
}
.search-form .form-group input.form-control::-moz-placeholder {
  /* Firefox 19+ */
  display: none;
}
.search-form .form-group input.form-control:-ms-input-placeholder {
  display: none;
}
.search-form .form-group:hover,
.search-form .form-group.hover {
  width: 100%;
  border-radius: 4px 4px 4px 4px;
}

.search-form .form-group span.form-control-feedback {
  display: none;
  position: absolute;
  top: -1px;
  right: -2px;
  z-index: 2;
  display: block;
  width: 34px;
  height: 34px;
  line-height: 34px;
  text-align: center;
  color: #777777;
  left: initial;
  font-size: 14px;
}


.search-form{
    visibility: hidden;
    width:0px;
    height:0px;
  }

@media only screen and (max-width: 767px) {  
.search-form{
    visibility: visible;
    width:100%;
    min-width: 90px;
    min-height: 32px;
  }

span.form-control-feedback {
    display: block;
  }
}

</style>
            <form action="" class="search-form pull-left">
                <div class="form-group has-feedback">
                    {{-- <label for="search" class="sr-only">Search</label> --}}
                    <input type="text" class="form-control" name="search" id="search" placeholder="Search ">
                    <a href="#"><span class="glyphicon glyphicon-search form-control-feedback w"></span></a>
                </div>
            </form>
