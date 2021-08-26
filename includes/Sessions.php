<?php
session_start();
function ErrorMassage()
{
    if (isset($_SESSION["ErrorMessage"])) {
        $Output = "<div class = \" alert alert-danger\">";
        $Output .= htmlentities($_SESSION["ErrorMessage"]);
        $Output .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">";
        $Output .= "&times;";
        $Output .= "</button>";
        $Output .= "</div > ";
        $_SESSION["ErrorMessage"] = null;
        return $Output;
    }
}

function SuccessMassage()
{
    if (isset($_SESSION["SuccessMessage"])) {
        $Output = "<div class = \" alert alert-success\">";
        $Output .= htmlentities($_SESSION["SuccessMessage"]);
        $Output .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">";
        $Output .= "&times;";
        $Output .= "</button>";
        $Output .= "</div > ";
        $_SESSION["SuccessMessage"] = null;
        return $Output;
    }
}

?>