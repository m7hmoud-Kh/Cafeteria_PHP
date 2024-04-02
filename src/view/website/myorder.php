<?php
session_start();
require '../../controller/website/OrderController.php';
if(!isset($_SESSION['user_id']))
{
    header("Location:login.php");
}
else{

    $order=new OrderController;
    function validate($page,$pageNumber)
    {
        return ($page>=1 and $page <=$pageNumber);
    }
    $page = (isset($_GET['page']) )? (int) $_GET['page'] :1;
    $totalCount=$order->getTotalCount($_SESSION['user_id']);
    $pageLimit=2;
    $pageNumber=ceil($totalCount/$pageLimit);
    $offset=($page-1) * $pageLimit;
    if (!validate($page,$pageNumber)) {
        header("Location:myorder.php?page=1");
    }
    $allOrders=$order->fetch_data($_SESSION['user_id'],$pageLimit, $offset);
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <form class="col-md-6 mb-3" id="dateFilterForm">
            <div class="form-row">
                <div class="col-5">
                    <input type="date" name="from" class="form-control" placeholder="Date from" onchange="filterOrders()">
                </div>
                <div class="col-5 offset-2">
                    <input type="date" name="to" class="form-control" placeholder="Date to" onchange="filterOrders()">
                </div>    
            </div>
        </form>
    </div>

    <div class="row">
        <table id="orderTableContainer" class="table col-12 table-bordered ">
            <tr class="table-primary">
                <th>Order Date</th>
                <th>Status</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
            <?php 
            $totalAmout=0;
            foreach($allOrders as $orderinfo)
            {
                echo "<tr class='table-success'>";
                echo "<td>".$orderinfo['created_at']." <button class='btn btn-primary btn-sm' onclick='toggleDetails(this)'>+</button>";
                echo "<div class='details' style='display: none;'>Additional details here...</div></td>"; 
                if($orderinfo['status']==1)
                    echo "<td> processing </td>";
                else if($orderinfo['status']==2)
                    echo "<td> out of delievry </td>";
                else if($orderinfo['status']==3)
                    echo "<td> Done </td>";      
                else if($orderinfo['status']==4)
                    echo "<td> Canceled </td>";      
                echo "<td>".$orderinfo['total']."</td>";
                $totalAmout+=$orderinfo['total'];
                $disabled = ($orderinfo['status'] == 2 || $orderinfo['status'] == 3 || $orderinfo['status'] == 4) ? 'disabled' : '';
                // Create the link with the disabled attribute if status is 2 or 3
                echo "<td><a href='http://localhost/Cafeteria_php/src/controller/website/OrderController.php?id={$orderinfo['id']}' class='btn btn-primary {$disabled}'>Cancel</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <div class="row">
        <div class="col-3 ml-50">
            <h3>Total EGP<?=$totalAmout?></h3> 
        </div>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php if($page==1) echo "disabled";?>">
                <a class="page-link" href="<?= $_SERVER['PHP_SELF']. "?page=".($page-1)?>" ><</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">page <?=$page?>  of <?=$pageNumber?></a></li>
            <li class="page-item <?php if($page==$pageNumber) echo "disabled";?>">
                <a class="page-link" href="<?=$_SERVER['PHP_SELF']. "?page=".($page+1)?>">></a>
            </li>
        </ul>
    </nav>
</div>

<script>
    function filterOrders() {
        var fromDate = document.getElementsByName('from')[0].value;
        var toDate = document.getElementsByName('to')[0].value;

        // Make AJAX request to filter orders based on from and to dates
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    // Replace the table content with the filtered orders
                    document.getElementById('orderTableContainer').innerHTML = xhr.responseText;
                } else {
                    console.error('Error:', xhr.status);
                }
            }
        };
        xhr.open('POST', window.location.href, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('from=' + fromDate + '&to=' + toDate);
    }

    function toggleDetails(button) {
        var details = button.nextElementSibling;
        if (details.style.display === 'none') {
            details.style.display = 'block';
            button.textContent = '-';
            console.log('Details shown.');
        } else {
            details.style.display = 'none';
            button.textContent = '+';
            console.log('Details hidden.');
        }
    }
</script>
