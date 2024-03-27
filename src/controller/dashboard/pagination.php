<?php
function validationPage(int $page,int $pageNumber):bool
{
return ($page >= 1 and $page <= $pageNumber) ;
}
