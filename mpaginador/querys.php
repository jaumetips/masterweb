
<?php
//START PROFILE
function fqinspictureusr($userid, $pos, $picursdir){
	
	$con = connDB();
    $query = "INSERT INTO pictureusr(picusrusrid,picusrpos,picusrdir) 
		VALUES('$userid', '$pos', '$picursdir')";
	//echo $query;	
	$r = mysqli_query($con, $query);

	discDB($con);
	return $r;
}

function fqselpicturesusr($usrid){
	$con = connDB();
    $query = "SELECT * FROM pictureusr WHERE picusrusrid = '$usrid' ORDER BY picusrpos ASC";
    //echo $query;
	$r = mysqli_query($con, $query);

	discDB($con);
	return $r;
}

function fqselpicturesusrid($usrid, $pos){
	$con = connDB();
    $query = "SELECT * FROM pictureusr WHERE picusrusrid = '$usrid' AND picusrpos = '$pos'";
    //echo $query;
	$r = mysqli_query($con, $query);

	discDB($con);
	return $r;
}

function fqdelpicturesusrid($picusrid){
	$con = connDB();
    $query = "DELETE FROM pictureusr WHERE picusrid='$picusrid'";
    //echo $query;
	$r = mysqli_query($con, $query);

	discDB($con);
	return $r;
}


function fqseluserdata($userid){
	$con = connDB();
    $query = "SELECT * FROM userdata WHERE userid='$userid'";
    //echo $query;
	$r = mysqli_query($con, $query);

	discDB($con);
	return $r;
}

function fqinsuserdata($userid, $userdesc){
	$con = connDB();
    $query = "INSERT INTO userdata(userdesc) VALUES('$userdesc')";
    //echo $query;
	$r = mysqli_query($con, $query);

	discDB($con);
	return $r;
}


function fqupduserdata($userid, $userdesc){
	$con = connDB();
    $query = "UPDATE userdata SET userdesc='$userdesc' WHERE userid='$userid'";
    //echo $query;
	$r = mysqli_query($con, $query);

	discDB($con);
	return $r;
}

//END PROFILE



//START PLACE
function fqinsplace($userid, $planame, $plalat, $plalng, $pladesc, $placapacity, $plasurface, $plastatus, $plastreet_number, $plaroute,
$plaflat, $plalocality, $plaadministrativearea, $placp, $placountry){
	$con = connDB();


	$placountry = mysqli_real_escape_string($con, $placountry);

    $query = "INSERT INTO place(plauserid, planame, plalat, plalng, pladesc, placapacity, plasurface, plastatus,
    	plastreet_number, plaroute, plaflat, plalocality, plaadministrativearea, placp, placountry) 
    VALUES('$userid','$planame','$plalat','$plalng','$pladesc','$placapacity', '$plasurface', '$plastatus',
    '$plastreet_number', '$plaroute', '$plaflat', '$plalocality', '$plaadministrativearea', '$placp', '".mysql_escape_string($placountry)."')";
    echo $query;
	$r = mysqli_query($con, $query);

    if($r==1){
      $r = mysqli_insert_id($con);
    }
    else{
      $r = 0;
    }
	discDB($con);
	return $r;
	
}

function fqinspicturepla($picplaplaid, $picplapos, $picpladir){
	
	$con = connDB();
    $query = "INSERT INTO picturepla(picplaplaid,picplapos,picpladir) 
		VALUES('$picplaplaid', '$picplapos', '$picpladir')";
	echo $query;	
	$r = mysqli_query($con, $query);

	discDB($con);
	return $r;
}


function fqselplaceall($plauserid){
$con = connDB();
    $query = "SELECT * FROM place AS p
    LEFT JOIN picturepla AS pp
    ON p.plaid=pp.picplaplaid
    WHERE p.plauserid='$plauserid'
    GROUP BY p.plaid ";
	echo $query . "<br>";	
	$r = mysqli_query($con, $query);
	discDB($con);
	return $r;
}



function fqselplacegrid($offset,$per_page){
    $con = connDB();
    $query = "SELECT * FROM place AS p
    LEFT JOIN picturepla AS pp
    ON p.plaid=pp.picplaplaid
    GROUP BY p.plaid 
    order by planame LIMIT $offset,$per_page";
	echo $query . "<br>";	
	$r = mysqli_query($con, $query);
	discDB($con);
	return $r;

}



function fqselplacegridcount(){
    $con = connDB();
    $query = "SELECT count(*) AS numrows FROM place ";
	echo $query . "<br>";		
	$r = mysqli_query($con, $query);
	discDB($con);
	return $r;

}


//END PLACE




?>