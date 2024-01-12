<footer class="indigo page-footer">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h5 class="white-text">Icon Credits</h5>
                <ul id='credits'>
                    <li>
                        Gif Logo made using <a href="http://formtypemaker.appspot.com/">Form Type Maker</a> from <a
                                href="https://github.com/romannurik/FORMTypeMaker">romannurik</a>
                    </li>
                    <li>
                        Icons made by <a href="https://material.io/icons/">Google</a>, available under <a
                                href="https://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License
                            Version 2.0</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <span>Made By <a style='font-weight: bold;' href="https://github.com/piedcipher"
                             target="_blank">Tirth Patel</a></span>
        </div>
    </div>
</footer>

</body>
</html>


<script type="text/javascript" src="{{ asset('https://code.jquery.com/jquery-2.2.4.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.button-collapse').sideNav();
        $('.collapsible').collapsible();
        $('select').material_select();
    });
</script>