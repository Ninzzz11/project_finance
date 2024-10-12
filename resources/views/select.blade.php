<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bootstrap Table Checkbox Select All and Cancel</title>
    <link href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h2>Bootstrap Table Checkbox Select All and Cancel</h2>
<table class="table table-striped">
    <tr>
        <th class="active">
            <input type="checkbox" class="select-all checkbox" name="select-all" />
        </th>
        <th class="success">Name</th>
        <th class="warning">Gender</th>
        <th class="danger">Age</th>
        <th class="info">Birth</th>
    </tr>
    <tr>
        <td class="active">
            <input type="checkbox" class="select-item checkbox" name="select-item" value="1000" />
        </td>
        <td class="success">Tom</td>
        <td class="warning">boy</td>
        <td class="danger">20</td>
        <td class="info">09-20</td>
    </tr>
    <tr>
        <td class="active">
            <input type="checkbox" class="select-item checkbox" name="select-item" value="1001" />
        </td>
        <td class="success">andy</td>
        <td class="warning">girl</td>
        <td class="danger">21</td>
        <td class="info">09-21</td>
    </tr>
    <tr>
        <td class="active">
            <input type="checkbox" class="select-item checkbox" name="select-item" value="1002" />
        </td>
        <td class="success">Alina</td>
        <td class="warning">girl</td>
        <td class="danger">22</td>
        <td class="info">09-22</td>
    </tr>
    <tr>
        <td class="active">
            <input type="checkbox" class="select-item checkbox" name="select-item" value="1003" />
        </td>
        <td class="success">Aaron </td>
        <td class="warning">boy</td>
        <td class="danger">23</td>
        <td class="info">09-23</td>
    </tr>
</table>
<button id="select-all" class="btn button-default">SelectAll/Cancel</button>
<button id="select-invert" class="btn button-default">Invert</button>
<button id="selected" class="btn button-default">GetSelected</button>

<div class="form-check form-check-inline">
    <input type="checkbox" class="select-all" id="selectAll">
    <label for="selectAll">Select All</label>
  </div>

  <div class="form-check form-check-inline">
    <input type="checkbox" id="checkbox1">
    <label for="checkbox1">Option 1</label>
  </div>

  <div class="form-check form-check-inline">
    <input type="checkbox" id="checkbox2">
    <label for="checkbox2">Option 2</label>
  </div>

</body>
  <script>
    $(document).ready(function() {
      $('.select-all').on('change', function() {
        var checked = $(this).prop('checked');
        $('.form-check-input').prop('checked', checked);
      });
    });
  </script>
<script src="//cdn.bootcss.com/jquery/2.2.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
    $(function(){

        //button select all or cancel
        $("#select-all").click(function () {
            var all = $("input.select-all")[0];
            all.checked = !all.checked
            var checked = all.checked;
            $("input.select-item").each(function (index,item) {
                item.checked = checked;
            });
        });

        //button select invert
        $("#select-invert").click(function () {
            $("input.select-item").each(function (index,item) {
                item.checked = !item.checked;
            });
            checkSelected();
        });

        //button get selected info
        $("#selected").click(function () {
            var items=[];
            $("input.select-item:checked:checked").each(function (index,item) {
                items[index] = item.value;
            });
            if (items.length < 1) {
                alert("no selected items!!!");
            }else {
                var values = items.join(',');
                console.log(values);
                var html = $("<div></div>");
                html.html("selected:"+values);
                html.appendTo("body");
            }
        });

        //column checkbox select all or cancel
        $("input.select-all").click(function () {
            var checked = this.checked;
            $("input.select-item").each(function (index,item) {
                item.checked = checked;
            });
        });

        //check selected items
        $("input.select-item").click(function () {
            var checked = this.checked;
            console.log(checked);
            checkSelected();
        });

        //check is all selected
        function checkSelected() {
            var all = $("input.select-all")[0];
            var total = $("input.select-item").length;
            var len = $("input.select-item:checked:checked").length;
            console.log("total:"+total);
            console.log("len:"+len);
            all.checked = len===total;
        }
    });
</script>
</html>
