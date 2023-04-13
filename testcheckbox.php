<script>
var $sportAll = $('#sportAll');
$sportAll.change(function () {
  var $this = $(this);
  var checked = $this.prop('checked'); // checked 문자열 참조(true, false)
  // console.log(checked);
  $('input[name="sports"]').prop('checked', checked);

});

var boxes = $('input[name="sports"]');
boxes.change(function () {
  
  var boxLength = boxes.length;
  
  var checkedLength = $('input[name="sports"]:checked').length;
  var selectAll = (boxLength == checkedLength);

  $sportAll.prop('checked', selectAll);

});

</script>

<form action="" id="frm">

  <p>
    Select your favorite sports
    (<label for="sportAll">select all</label>
    <input type="checkbox" name="dummy" id="sportAll">)
  </p>
  <ul>
    <li>
      <label for="Baseball">Baseball</label>
      <input type="checkbox" name="sports" id="Baseball"></li>
    </li>
    <li>
      <label for="Basketball">Basketball</label>
      <input type="checkbox" name="sports" id="Basketball"></li>
    </li>
    <li>
      <label for="Hockey">Hockey</label>
      <input type="checkbox" name="sports" id="Hockey"></li>
    </li>
    <li>
      <label for="Soccer">Soccer</label>
      <input type="checkbox" name="sports" id="Soccer"></li>
    </li>
  </ul>

</form>
