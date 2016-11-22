<style>

.mainsearch .form-group {
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
.mainsearch .form-group input.fromcont {
  padding-top: 4px;  
  padding-right: 20px;
  border: 0 none;
  background: transparent;
  box-shadow: none;
  display:block;
}
.mainsearch .form-group input.fromcont::-webkit-input-placeholder {
  display: none;
}
.mainsearch .form-group input.fromcont:-moz-placeholder {
  /* Firefox 18- */
  display: none;
}
.mainsearch .form-group input.fromcont::-moz-placeholder {
  /* Firefox 19+ */
  display: none;
}
.mainsearch .form-group input.fromcont:-ms-input-placeholder {
  display: none;
}
.mainsearch .form-group:hover,
.mainsearch .form-group.hover {
  width: 100%;
  border-radius: 4px 4px 4px 4px;
}
.mainsearch .form-group span.formcontfdbk {
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


.mainsearch{
    visibility: visible;
  }


@media only screen and (max-width: 767px) {  

.mainsearch{
    visibility: hidden;
    width: 0px;
    height: 0px;
  }
}

</style>

            <form action="" class="mainsearch pull-left">
                <div class="form-group has-feedback">
                    {{-- <label for="search" class="sr-only">Search</label> --}}
                    <input type="text" class="form-control fromcont" name="search" id="search" placeholder="Search ">
                    <a href="#"><span class="glyphicon glyphicon-search form-control-feedback formcontfdbk"></span></a>
                </div>
            </form>
