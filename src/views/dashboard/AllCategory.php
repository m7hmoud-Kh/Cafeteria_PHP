<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<h1>All Category</h1>
<div class="container align">
<a class="w-0 h-25 btn btn-primary" href="../../views/dashboard/AddCategory.php">Add category</a>

<table class="table  table-hover my-lg-4 table-sm  justify-content-center">

<thead >
        <th  scope="col">Id</th>
        <th  scope="col">Name </th>
        <th  scope="col">created at </th>
        <th  scope="col">action </th>
        <tr>
        </thead>
        <?php
         require("../../model/Connection.php");
         require("../../model/Category.php");
         require_once("../../controller/dashboard/pagination.php");
         $result=new Category();
         $categories=$result->get_category();

echo "<pre>";
        foreach($categories as $category)
        {
            echo "<tbody>";
            echo "<tr>";
            foreach($category as $key=>$data){
            
              
                    
                    echo "<td>$data</td>";
                        
        
                        
                      }
        
                    echo "<td>
                    <a class='btn btn-primary' href= ' EditCategory.php?id={$category['id']}'>edit</a>
                    <a class='btn btn-danger' href='DeleteCategory.php?id={$category['id']}'>delete</a>
                    </td>";
        
                    echo "</tr>";
                    echo "</tbody>";

      }
?>
</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
    