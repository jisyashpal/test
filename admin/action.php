<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';
include 'helper.php';
session_start();
include "connection.php";




// if (isset($_POST['addtestimonial'])) {
// 	$name = $_POST['name'];
// 	$profession = $_POST['profession'];
// 	$content = $_POST['content'];
// 	$photo = $_FILES['image']['name'];

// 	$photo = explode('.', $photo);
// 	$image = time() . $photo[0];
// 	$imagename = $_FILES['image']['tmp_name'];
// 	list($width, $height) = getimagesize($_FILES['image']['tmp_name']);
// 	$dir = "uploads/testi/";
// 	$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif", "webp");
// 	$check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);
// 	if ($check === true) {
// 		$image = $image . ".jpg";

// 		$query = "INSERT INTO `testimonials` (`image`,`name`,`profession`,`content`) VALUES ('$image','$name','$profession','$content')";
// 		$sql = mysqli_query($conn, $query);

// 		if ($sql) {
// 			$_SESSION['msg'] = "Added Successfully !!!";
// 			echo '<script type="text/javascript">
//         window.location.href = "testimonial.php";
//        </script>';
// 		} else {
// 			$_SESSION['msg'] = "Not Added !!!";
// 			header("location:$_SERVER[HTTP_REFERER]");
// 		}
// 	} else {
// 		$_SESSION['msg'] = $check;
// 		header("location:$_SERVER[HTTP_REFERER]");
// 	}
// }


function Imageupload($dir, $inputname, $allext, $pass_width, $pass_height, $pass_size, $newname)
{
	if (file_exists($_FILES["$inputname"]["tmp_name"])) {
		$file_extension = strtolower(pathinfo($_FILES["$inputname"]["name"], PATHINFO_EXTENSION));
		$error = "";
		if (in_array($file_extension, $allext)) {
			list($width, $height, $type, $attr) = getimagesize($_FILES["$inputname"]["tmp_name"]);
			$image_weight = $_FILES["$inputname"]["size"];

			if ($width <= "$pass_width" && $height <= "$pass_height" && $image_weight <= "$pass_size") {

				$tmp = $_FILES["$inputname"]["tmp_name"];
				if ($file_extension == 'pdf' || $file_extension == 'PDF') {
					$extension[1] = "pdf";
				} else {
					$extension[1] = "jpg";
				}
				$name = $newname . "." . $extension[1];

				if (move_uploaded_file($tmp, "$dir" . $name)) {
					return true;
				}
			} else {
				$error .= "Please upload photo size of $pass_width X $pass_height !!!";
			}
		} else {
			$error .= "Please upload an image !!!";
		}
	}
	return $error;
}


if (isset($_POST['adminlogin'])) {
	$email = $_POST['email'];
	$password = $_POST['pass'];

	if ($email === '' || $password === '') {
		$_SESSION['msg'] = 'Email and Password cannot be empty.';
		header('location:index.php');
		exit();
	} else {

		$query = "SELECT * FROM `username` WHERE `email`='$email' and `password`='$password'";
		$run = mysqli_query($conn, $query);
		$num = mysqli_num_rows($run);

		if ($num) {
			$data = mysqli_fetch_assoc($run);
			$_SESSION['id'] = $data['id'];
			$_SESSION['email'] = $data['email'];
			$_SESSION['name'] = $data['name'];
			$_SESSION['role'] = 'Admin';

			echo '<script type="text/javascript">
			alert("Login successful!");
			window.location.href = "dashboard.php";
			</script>';
			exit();
		} else {
			$_SESSION['msg'] = 'Invalid details !!!';
			echo '<script type="text/javascript">
			alert("Invalid email or password!");
			window.location.href = "index.php";
		   </script>';
			exit();
		}
	}
	// header("Location: " . $_SERVER['HTTP_REFERER']);
}







// if (isset($_POST['update_banermob'])) {
// 	$id = $_POST['editid'];
// 	$photo = $_FILES['image']['name'];
// 	if (!empty($photo)) {
// 		$photo = explode('.', $photo);
// 		$image = time() . $photo[0];
// 		$imagename = $_FILES['image']['tmp_name'];
// 		$imagename = $_FILES['image']['tmp_name'];
// 		list($width, $height) = getimagesize($_FILES['image']['tmp_name']);
// 		$dir = "uploads/banner/";
// 		$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif");
// 		$check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);
// 	}
// 	if ($check === true) {
// 		$image = $image . ".jpg";
// 		$added_on = date('Y-m-d');
// 		$query = "UPDATE `tbl_bannermobile` SET `image`='$image' WHERE `id`='$id'";
// 		$sql = mysqli_query($conn, $query);
// 		if ($sql) {
// 			header('Location:addmobbanner.php');
// 			$_SESSION['msg'] = "Image Updated Successfully !!!";
// 		} else {
// 			$_SESSION['msg'] = "Image Not Updated!!!";
// 			header("location:$_SERVER[HTTP_REFERER]");
// 		}
// 	} else {
// 		$_SESSION['msg'] = $check;
// 		header("location:$_SERVER[HTTP_REFERER]");
// 	}
// }


if (isset($_POST['adminlogins'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql = "INSERT INTO `username`(`email`,`password`) VALUES ('$email','$password')";
	if ($conn->query($sql) === TRUE) {
		$_SESSION['msg'] = "admin  create successfully";
		header('location:user.php');
	} else {
		echo "Error record: " . $conn->error;
	}
}
//admin update
if (isset($_POST['update_user'])) {

	$email = $_POST['email'];
	$password = $_POST['password'];
	$editid = $_POST['editid'];

	$sql = " UPDATE `username` SET `email`='$email',`password`='$password' WHERE `id`='$editid'";
	if ($conn->query($sql) === TRUE) {
		$_SESSION['msg'] = "admin  update successfully";
		header('location:user.php');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}




if (isset($_POST['addbanner'])) {

	$photo = $_FILES['image']['name'];
	$photo = explode('.', $photo);
	$image = time() . $photo[0];
	$imagename = $_FILES['image']['tmp_name'];
	list($width, $height) = getimagesize($_FILES['image']['tmp_name']);
	$dir = "uploads/banner/";
	$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif");
	$check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);
	if ($check === true) {
		$image = $image . ".jpg";

		$query = "INSERT INTO `tbl_banner` (`image`) VALUES ('$image')";
		$sql = mysqli_query($conn, $query);

		if ($sql) {
			header('Location:bannerlist.php');
			$_SESSION['msg'] = "Banner Added Successfully !!!";
		} else {
			$_SESSION['msg'] = "Banner Not Added !!!";
			header("location:$_SERVER[HTTP_REFERER]");
		}
	} else {
		$_SESSION['msg'] = $check;
		header("location:$_SERVER[HTTP_REFERER]");
	}
}


if (isset($_POST['addsponsor'])) {
	$title = $_POST['title'];
	$description = $_POST['description'];
	$photo = $_FILES['image']['name'];

	$photo = explode('.', $photo);
	$image = time() . "_" . $photo[0];
	$dir = "uploads/sponsors/";
	$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif", "webp");

	// Reusing the Imageupload function from action.php
	$check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);

	if ($check === true) {
		$image = $image . ".jpg";
		$query = "INSERT INTO `tbl_co_sponsors` (`title`, `description`, `image`, `status`) VALUES ('$title', '$description', '$image', '1')";
		$sql = mysqli_query($conn, $query);

		if ($sql) {
			$_SESSION['msg'] = "Co-Sponsor Added Successfully !!!";
			header("location:co-sponsors.php");
		} else {
			$_SESSION['msg'] = "Database Error: " . mysqli_error($conn);
			header("location:$_SERVER[HTTP_REFERER]");
		}
	} else {
		$_SESSION['msg'] = $check;
		header("location:$_SERVER[HTTP_REFERER]");
	}
}

if (isset($_POST['addaccolade'])) {
	$title = $_POST['title'];
	$photo = $_FILES['image']['name'];

	$photo = explode('.', $photo);
	$image = time() . "_" . $photo[0];
	$dir = "uploads/accolades/";
	$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif", "webp");

	$check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);

	if ($check === true) {
		$image = $image . ".jpg";
		$query = "INSERT INTO `tbl_accolades` (`title`, `image`, `status`) VALUES ('$title', '$image', '1')";
		$sql = mysqli_query($conn, $query);

		if ($sql) {
			$_SESSION['msg'] = "Accolade Added Successfully !!!";
			header("location:accolades.php");
		} else {
			$_SESSION['msg'] = "Database Error: " . mysqli_error($conn);
			header("location:$_SERVER[HTTP_REFERER]");
		}
	} else {
		$_SESSION['msg'] = $check;
		header("location:$_SERVER[HTTP_REFERER]");
	}
}

if (isset($_POST['update_accolade'])) {
	$id = $_POST['editid'];
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$photo = isset($_FILES['image']) ? $_FILES['image']['name'] : '';

	$current = mysqli_query($conn, "SELECT * FROM tbl_accolades WHERE id='$id'");
	$existing = mysqli_fetch_assoc($current);
	$oldImage = $existing['image'];

	$updateFields = "title='$title'";

	if (!empty($photo)) {
		$photo_parts = explode('.', $photo);
		$image = time() . "_" . $photo_parts[0];
		$dir = "uploads/accolades/";
		$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif", "webp");
		$check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);
		if ($check === true) {
			$newImage = $image . ".jpg";
			if (!empty($oldImage) && file_exists($dir . $oldImage)) {
				unlink($dir . $oldImage);
			}
			$updateFields .= ", image='$newImage'";
		} else {
			$_SESSION['msg'] = $check;
			header('Location:accolades.php');
			exit;
		}
	}

	$query = "UPDATE tbl_accolades SET $updateFields WHERE id='$id'";
	$sql = mysqli_query($conn, $query);
	if ($sql) {
		$_SESSION['msg'] = "Accolade updated successfully";
	} else {
		$_SESSION['msg'] = "Update failed: " . mysqli_error($conn);
	}

	header('Location:accolades.php');
	exit;
}


if (isset($_POST['addabout'])) {

	$name = $_POST['name'];
	$photo = $_FILES['image']['name'];
	$photo = explode('.', $photo);
	$image = time() . $photo[0];
	$imagename = $_FILES['image']['tmp_name'];
	list($width, $height) = getimagesize($_FILES['image']['tmp_name']);
	$dir = "uploads/banner/";
	$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif");
	$check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);
	if ($check === true) {
		$image = $image . ".jpg";

		$query = "INSERT INTO `tbl_abouthome` (`name`,`image`) VALUES ('$name','$image')";
		$sql = mysqli_query($conn, $query);

		if ($sql) {
			header('Location:about.php');
			$_SESSION['msg'] = "About Added  Added Successfully !!!";
		} else {
			$_SESSION['msg'] = "About Added Not Added !!!";
			header("location:$_SERVER[HTTP_REFERER]");
		}
	} else {
		$_SESSION['msg'] = $check;
		header("location:$_SERVER[HTTP_REFERER]");
	}
}


// Flash News
if (isset($_POST['sub_flashnews'])) {
	// echo '<pre>';
	// print_r($_POST);die;


	$flashnews = $_POST["flashnews"];


	$sql = "INSERT INTO `flashnews`(`flashnews`) VALUES ('$flashnews')";
	if ($conn->query($sql) === TRUE) {
		header("location:$_SERVER[HTTP_REFERER]");
		$_SESSION['msg'] = "Flash News  Added Successfully !!!";
		header("location:flash_news.php");
	} else {
		$_SESSION['msg'] = "Flash News Not Added !!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
}




if (isset($_POST['update_banerlist'])) {
	$id = $_POST['editid'];
	$photo = $_FILES['image']['name'];

	// Fetch the old image from the database
	$result = mysqli_query($conn, "SELECT image FROM tbl_banner WHERE id='$id'");
	$row = mysqli_fetch_assoc($result);
	$old_image = $row['image'];

	if (!empty($photo)) {
		$photo_parts = explode('.', $photo);
		$image = time() . $photo_parts[0];
		$imagename = $_FILES['image']['tmp_name'];
		list($width, $height) = getimagesize($imagename);
		$dir = "uploads/banner/";
		$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif");
		// $check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);
		$check = Imageupload($dir, 'image', $allext, 1920, 809, 20000000, $image);

		if ($check === true) {
			$new_image = $image . ".jpg";

			// Delete the old image from the folder
			if (file_exists($dir . $old_image)) {
				unlink($dir . $old_image);
			}

			// Update the database with the new image
			$query = "UPDATE `tbl_banner` SET `image`='$new_image' WHERE `id`='$id'";
			$sql = mysqli_query($conn, $query);

			if ($sql) {
				$_SESSION['msg'] = "Image Updated Successfully !!!";
				header('Location:bannerlist.php');
				exit();
			} else {
				$_SESSION['msg'] = "Image Not Updated!!!";
				header("Location: " . $_SERVER['HTTP_REFERER']);
				exit();
			}
		} else {
			$_SESSION['msg'] = $check;
			header("Location: " . $_SERVER['HTTP_REFERER']);
			exit();
		}
	} else {
		$_SESSION['msg'] = "No image selected!";
		header("Location: " . $_SERVER['HTTP_REFERER']);
		exit();
	}
}

// if (isset($_POST['update_banerlistmobile'])) {
// 	$id = $_POST['editid'];
// 	$photo = $_FILES['image']['name'];
// 	if (!empty($photo)) {
// 		$photo = explode('.', $photo);
// 		$image = time() . $photo[0];
// 		$imagename = $_FILES['image']['tmp_name'];
// 		$imagename = $_FILES['image']['tmp_name'];
// 		list($width, $height) = getimagesize($_FILES['image']['tmp_name']);
// 		$dir = "uploads/banner/";
// 		$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif");
// 		$check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);
// 	}
// 	if ($check === true) {
// 		$image = $image . ".jpg";
// 		$added_on = date('Y-m-d');
// 		$query = "UPDATE `tbl_mobilebanner` SET `image`='$image' WHERE `id`='$id'";
// 		$sql = mysqli_query($conn, $query);
// 		if ($sql) {
// 			header('Location:bannermobilelist.php');
// 			$_SESSION['msg'] = "Image Updated Successfully !!!";
// 		} else {
// 			$_SESSION['msg'] = "Image Not Updated!!!";
// 			header("location:$_SERVER[HTTP_REFERER]");
// 		}
// 	} else {
// 		$_SESSION['msg'] = $check;
// 		header("location:$_SERVER[HTTP_REFERER]");
// 	}
// }


if (isset($_POST['update_aboutlist'])) {
	$name = $_POST['name'];
	$id = $_POST['editid'];
	$photo = $_FILES['image']['name'];
	if (!empty($photo)) {
		$photo = explode('.', $photo);
		$image = time() . $photo[0];
		$imagename = $_FILES['image']['tmp_name'];
		$imagename = $_FILES['image']['tmp_name'];
		list($width, $height) = getimagesize($_FILES['image']['tmp_name']);
		$dir = "uploads/banner/";
		$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif");
		$check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);
	}
	if ($check === true) {
		$image = $image . ".jpg";

		$query = "UPDATE `tbl_abouthome` SET `image`='$image' ,`name`='$name' WHERE `id`='$id'";
		// echo '<pre>';
		// print_r($query); die;
		$sql = mysqli_query($conn, $query);
		if ($sql) {
			header('Location:about.php');
			$_SESSION['msg'] = "Image Updated Successfully !!!";
		} else {
			$_SESSION['msg'] = "Image Not Updated!!!";
			header("location:$_SERVER[HTTP_REFERER]");
		}
	} else {
		$_SESSION['msg'] = $check;
		header("location:$_SERVER[HTTP_REFERER]");
	}
}


if (isset($_POST['addourproduct'])) {

	$photo = $_FILES['image']['name'];
	$photo = explode('.', $photo);
	$image = time() . $photo[0];
	$imagename = $_FILES['image']['tmp_name'];
	list($width, $height) = getimagesize($_FILES['image']['tmp_name']);
	$dir = "uploads/banner/";
	$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif");
	$check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);
	if ($check === true) {
		$image = $image . ".jpg";

		$query = "INSERT INTO `tbl_homeproducts` (`image`) VALUES ('$image')";
		$sql = mysqli_query($conn, $query);

		if ($sql) {
			header('Location:ourproducts.php');
			$_SESSION['msg'] = "Product Added  Successfully !!!";
		} else {
			$_SESSION['msg'] = "Product Added Not Added !!!";
			header("location:$_SERVER[HTTP_REFERER]");
		}
	} else {
		$_SESSION['msg'] = $check;
		header("location:$_SERVER[HTTP_REFERER]");
	}
}

if (isset($_POST['update_ourproducts'])) {
	$id = $_POST['editid'];
	$photo = $_FILES['image']['name'];
	if (!empty($photo)) {
		$photo = explode('.', $photo);
		$image = time() . $photo[0];
		$imagename = $_FILES['image']['tmp_name'];
		$imagename = $_FILES['image']['tmp_name'];
		list($width, $height) = getimagesize($_FILES['image']['tmp_name']);
		$dir = "uploads/banner/";
		$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif");
		$check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);
	}
	if ($check === true) {
		$image = $image . ".jpg";
		$added_on = date('Y-m-d');
		$query = "UPDATE `tbl_homeproducts` SET `image`='$image' WHERE `id`='$id'";
		$sql = mysqli_query($conn, $query);
		if ($sql) {
			header('Location:ourproducts.php');
			$_SESSION['msg'] = "Products Updated Successfully !!!";
		} else {
			$_SESSION['msg'] = "Products Not Updated!!!";
			header("location:$_SERVER[HTTP_REFERER]");
		}
	} else {
		$_SESSION['msg'] = $check;
		header("location:$_SERVER[HTTP_REFERER]");
	}
}

if (isset($_POST['update_ourproducts'])) {
	// Database connection assumed to be established earlier and stored in $conn

	// Retrieving form data
	$id = $_POST['editid'];
	$name = $_POST["name"];
	$content = $_POST["content"];

	// Retrieving file names and handling uploads
	$image1 = $_FILES['image1']['name'];
	$image2 = $_FILES['image2']['name'];
	$image3 = $_FILES['image3']['name'];

	// Directory for image uploads
	$uploadDirectory = "uploads/products/";

	// Generating unique names for images to avoid conflicts
	$image1Name = time() . basename($image1);
	$image2Name = time() . basename($image2);
	$image3Name = time() . basename($image3);

	// Valid extensions for images
	$allowedExtensions = array("png", "jpg", "jpeg", "gif");

	// Moving uploaded files to the upload directory
	if (
		move_uploaded_file($_FILES['image1']['tmp_name'], $uploadDirectory . $image1Name) &&
		move_uploaded_file($_FILES['image2']['tmp_name'], $uploadDirectory . $image2Name) &&
		move_uploaded_file($_FILES['image3']['tmp_name'], $uploadDirectory . $image3Name)
	) {
		// Constructing SQL query to update product information
		$query = "UPDATE `tbl_products` SET `name`='$name', `content`='$content', `image1`='$image1Name', `image2`='$image2Name', `image3`='$image3Name' WHERE `id`='$id'";

		// Executing the query
		if (mysqli_query($conn, $query)) {
			// If update is successful, redirect to products page
			$_SESSION['msg'] = "Products Update Successfully !!!";
			header("location: products.php");
			exit();
		} else {
			// If query execution fails, store error message in session
			$_SESSION['msg'] = "Error: " . mysqli_error($conn);
		}
	} else {
		// If file upload fails, store error message in session
		$_SESSION['msg'] = "File upload failed.";
	}

	// Redirecting back to the previous page
	header("location: {$_SERVER['HTTP_REFERER']}");
	exit();
}



if (isset($_POST['carreer'])) {


	$name = $_POST['name'];
	$email = $_POST['email'];
	$contact = $_POST['mobile'];
	$photo = $_FILES['image']['name'];
	$photo = explode('.', $photo);
	$image = time() . $photo[0];
	$imagename = $_FILES['image']['tmp_name'];
	// echo '<pre>';
	// print_r($photo);die;
	list($width, $height) = getimagesize($_FILES['image']['tmp_name']);
	$dir = "uploads/banner/";
	$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif");
	$check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);

	if ($check === true) {
		$image = $image . ".jpg";

		$query = "INSERT INTO `tbl_career` (`name`,`email`,`contact`,`image`) VALUES ('$name','$email','$contact','$image')";
		$sql = mysqli_query($conn, $query);

		if ($sql) {
			header('Location:../career.php');
			$_SESSION['msg'] = "List Updated !!!";
		} else {
			$_SESSION['msg'] = "Join The Logik Family Today Not Added !!!";
			header("location:$_SERVER[HTTP_REFERER]");
		}
	} else {
		$_SESSION['msg'] = $check;
		header("location:$_SERVER[HTTP_REFERER]");
	}
}



if (isset($_POST['addimagecategory'])) {
	$imagecategory = $_POST["imagecategory"];

	$sql = "INSERT INTO `tbl_imagecategory`(`imagecategory`) VALUES ('$imagecategory')";
	if ($conn->query($sql) === TRUE) {
		header("location:$_SERVER[HTTP_REFERER]");
		$_SESSION['msg'] = "Image Category  Added Successfully !!!";
		header("location:category.php");
	} else {
		$_SESSION['msg'] = "Message Not Added !!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
}
if (isset($_POST['addnewsevents'])) {
	$news = $_POST["news"];
	$events = $_POST["events"];

	$sql = "INSERT INTO `tbl_news`(`news`,`events`) VALUES ('$news','$events')";
	if ($conn->query($sql) === TRUE) {
		header("location:$_SERVER[HTTP_REFERER]");
		$_SESSION['msg'] = "News And Events  Added Successfully !!!";
		header("location:news.php");
	} else {
		$_SESSION['msg'] = "Message Not Added !!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
}

if (isset($_POST['addachiversss'])) {
	$name = $_POST["name"];


	$sql = "INSERT INTO `tbl_achivers`(`name`) VALUES ('$name')";
	if ($conn->query($sql) === TRUE) {
		header("location:$_SERVER[HTTP_REFERER]");
		$_SESSION['msg'] = "Achievers  Added Successfully !!!";
		header("location:achiverslist.php");
	} else {
		$_SESSION['msg'] = "Message Not Added !!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
}



if (isset($_POST['update_addcategoryy'])) {

	$imagecategory = $_POST["imagecategory"];
	$editid = $_POST['editid'];

	$sql = " UPDATE `tbl_imagecategory` SET `imagecategory`='$imagecategory' WHERE `id`='$editid'";
	if ($conn->query($sql) === TRUE) {
		header("location:$_SERVER[HTTP_REFERER]");
		$_SESSION['msg'] = "category List Update Successfully !!!";
		header("location:category.php");
	} else {
		$_SESSION['msg'] = "category Not Update !!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
}


if (isset($_POST['addcategory'])) {
	$video = $_POST["video"];
	$name = $_POST["name"];
	$description = $_POST["description"];
	$sql = "INSERT INTO `tbl_tutorial`(`video`,`name`,`description`) VALUES ('$video','$name','$description')";
	if ($conn->query($sql) === TRUE) {
		header("location:$_SERVER[HTTP_REFERER]");
		$_SESSION['msg'] = "category  Added Successfully !!!";
		header("location:categorylist.php");
	} else {
		$_SESSION['msg'] = "category Not Added !!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
}

if (isset($_POST['addcategory'])) {
	$fromdate = $_POST["fromdate"];
	$todate = $_POST["todate"];
	$category = $_POST["category"];
	$sql = "INSERT INTO `tbl_addcategory`(`fromdate`,`todate`,`category`) VALUES ('$fromdate','$todate','$category')";
	if ($conn->query($sql) === TRUE) {
		header("location:$_SERVER[HTTP_REFERER]");
		$_SESSION['msg'] = "category  Added Successfully !!!";
		header("location:categorylist.php");
	} else {
		$_SESSION['msg'] = "category Not Added !!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
}
if (isset($_POST['update_addcategory'])) {

	$fromdate = $_POST["fromdate"];
	$todate = $_POST["todate"];
	$category = $_POST["category"];
	$editid = $_POST['editid'];

	$sql = " UPDATE `tbl_addcategory` SET `fromdate`='$fromdate',`todate`='$todate',`category`='$category' WHERE `id`='$editid'";
	if ($conn->query($sql) === TRUE) {
		header("location:$_SERVER[HTTP_REFERER]");
		$_SESSION['msg'] = "category  Update Successfully !!!";
		header("location:categorylist.php");
	} else {
		$_SESSION['msg'] = "category Not Update !!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
}
if (isset($_POST['addcategorytask'])) {
	$fromdate = $_POST["fromdate"];
	$todate = $_POST["todate"];
	$category = $_POST["category"];
	$task = $_POST["task"];
	$sql = "INSERT INTO `tbl_addcategorytask`(`fromdate`,`todate`,`category`,`task`) VALUES ('$fromdate','$todate','$category','$task')";
	if ($conn->query($sql) === TRUE) {
		header("location:$_SERVER[HTTP_REFERER]");
		$_SESSION['msg'] = "category Task  Added Successfully !!!";
		header("location:categorytasklist.php");
	} else {
		$_SESSION['msg'] = "category Task Not Added !!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
}
if (isset($_POST['update_addcategorytask'])) {

	$fromdate = $_POST["fromdate"];

	$todate = $_POST["todate"];
	$category = $_POST["category"];
	$task = $_POST["task"];
	$editid = $_POST['editid'];

	$sql = " UPDATE `tbl_addcategorytask` SET `fromdate`='$fromdate',`todate`='$todate',`category`='$category',`task`='$task' WHERE `id`='$editid'";
	if ($conn->query($sql) === TRUE) {
		header("location:$_SERVER[HTTP_REFERER]");
		$_SESSION['msg'] = "category Task Update Successfully !!!";
		header("location:categorytasklist.php");
	} else {
		$_SESSION['msg'] = "category Task Not Update !!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
}

if (isset($_POST['update_task'])) {

	$fromdate = $_POST["fromdate"];
	$todate = $_POST["todate"];
	$task = $_POST["task"];
	$task_name = $_POST["task_name"];
	$editid = $_POST['editid'];

	$sql = " UPDATE `tbl_task` SET `fromdate`='$fromdate',`todate`='$todate',`task`='$task',`task_name`='$task_name' WHERE `id`='$editid'";
	if ($conn->query($sql) === TRUE) {
		header("location:$_SERVER[HTTP_REFERER]");
		$_SESSION['msg'] = " Task Update Successfully !!!";
		header("location:tasklist.php");
	} else {
		$_SESSION['msg'] = " Task Not Update !!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
}

if (isset($_POST['userregister'])) {
	$name = $_POST["name"];
	$password = $_POST["password"];
	$email = $_POST["email"];

	$sql = "INSERT INTO `tbl_userregister`(`name`,`password`,`email`) VALUES 
	('$name','$password','$email')";
	if ($conn->query($sql) === TRUE) {
		header("location:$_SERVER[HTTP_REFERER]");
		$_SESSION['msg'] = " User Register Successfully !!!";
		header("location:../index.php");
	} else {
		$_SESSION['msg'] = " User Not Register !!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
}

if (isset($_POST['userlogin'])) {
	if (!isset($_POST['email']) || !isset($_POST['password'])) {
		$_SESSION['msg'] = 'Email and Password are required.';
		header('location:../login.php');
		exit();
	}
	$email = $_POST['email'];
	$password = $_POST['password'];
	$query = "SELECT * FROM `tbl_userlogin` WHERE `email`='$email' and `password`='$password'";
	$run = mysqli_query($conn, $query);
	$num = mysqli_num_rows($run);

	if ($num) {
		$data = mysqli_fetch_assoc($run);
		$_SESSION['id'] = $data['id'];
		$_SESSION['name'] = $data['name'];
		$_SESSION['email'] = $data['email'];
		$_SESSION['password'] = $data['password'];
		$_SESSION['msg'] = 'User Login Successfully !!!';
		header('location:../index.php');
	} else {
		$_SESSION['msg'] = 'Invalid details !!!';
		header('location:../login.php');
	}
}
if (isset($_POST['userlogins'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Check if the email already exists
	$check_email_sql = "SELECT COUNT(*) as count FROM `tbl_userlogin` WHERE `email`='$email'";
	$result = $conn->query($check_email_sql);
	$row = $result->fetch_assoc();

	if ($row['count'] > 0) {
		// Email already registered
		$_SESSION['msg'] = "Email is already registered. Please enter a different email.";
		header('location:../index.php');
		exit; // Stop further execution
	}

	// If email doesn't exist, proceed with registration
	$sql = "INSERT INTO `tbl_userlogin`(`email`,`password`,`name`) VALUES ('$email','$password','$name')";
	if ($conn->query($sql) === TRUE) {
		$_SESSION['msg'] = "User registered successfully";
		header('location:../index.php');
	} else {
		echo "Error creating record: " . $conn->error;
	}
}


if (isset($_POST['userforgetpass'])) {
	$email = $_POST['email'];
	$query = "SELECT * FROM `tbl_userlogin` WHERE `email`='$email'";
	$run = mysqli_query($conn, $query);
	$num = mysqli_num_rows($run);
	if ($num) {
		$data = mysqli_fetch_assoc($run);
		$_SESSION['id'] = $data['id'];
		$_SESSION['msg'] = 'Correct Email !!!';
		header('location: ../createpass.php');
	} else {
		$_SESSION['msg'] = 'Wrong Email !!!';
		header("Location: " . $_SERVER['HTTP_REFERER']);
	}
}
if (isset($_POST['newpasswordcrt'])) {
	$password = $_POST['password'];
	$edit_id = $_POST['edit_id'];
	$sql = " UPDATE `tbl_userlogin` SET `password`='$password' WHERE `id`='$edit_id'";
	if ($conn->query($sql) === TRUE) {
		$_SESSION['msg'] = "Password Update Sucessfully !!!";
		header('location:../index.php');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
if (isset($_POST['completedtask'])) {
	$id = $_POST['id'];
	$sql = "UPDATE `tbl_consultnow` SET `completed`='1' WHERE `id`='$id'";
	if ($conn->query($sql) === TRUE) {
		$_SESSION['msg'] = " Your Task is  Completed !!!";
		header('location:../index.php');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}






if (isset($_POST['save_video'])) {
	if (!isset($_FILES['uploadingfile']) || $_FILES['uploadingfile']['error'] !== UPLOAD_ERR_OK) {
		echo "Error uploading file: " . ($_FILES['uploadingfile']['error'] ?? 'File not provided');
		exit;
	}

	$fileTmpPath = $_FILES['uploadingfile']['tmp_name'];
	$fileName = basename($_FILES['uploadingfile']['name']);
	$fileType = $_FILES['uploadingfile']['type'];

	$allowedTypes = ['video/mp4', 'video/avi', 'video/mpeg', 'video/quicktime'];
	if (!in_array($fileType, $allowedTypes)) {
		echo "Error: Invalid video format. Only MP4, AVI, MPEG, and QuickTime are allowed.";
		exit;
	}
	$destination = 'uploads/video/' . uniqid("vid_", true) . '_' . $fileName;

	if (!move_uploaded_file($fileTmpPath, $destination)) {
		echo "Failed to upload file.";
		exit;
	}
	if (!$conn) {
		die("Database connection failed: " . mysqli_connect_error());
	}
	$sql = "INSERT INTO tbl_tutorial (uploadingfile) VALUES (?)";
	if ($stmt = $conn->prepare($sql)) {
		$stmt->bind_param("s", $fileName);
		if ($stmt->execute()) {
			$_SESSION['msg'] = "Video Added Successfully !!!";
			header('Location: tutorial.php');
		} else {
			$_SESSION['msg'] = "Courses Not Updated!!!" . $stmt->error;
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}
		$stmt->close();
	} else {
		echo "Preparation error: " . $conn->error;
	}
}

if (isset($_POST['update_video'])) {
	$id = $_POST['editid'];
	$uploadingfile = $_FILES['uploadingfile'];

	if ($uploadingfile['error'] === UPLOAD_ERR_OK) {
		$upload_dir = 'uploads/video/';
		$filename = basename($uploadingfile['name']);
		$target_path = $upload_dir . $filename;

		if (move_uploaded_file($uploadingfile['tmp_name'], $target_path)) {
			$sql = "UPDATE tbl_tutorial SET uploadingfile = '$filename' WHERE id = $id";

			if (mysqli_query($conn, $sql)) {
				$_SESSION['msg'] = "Video Updated Successfully!";
				header('Location: tutorial.php');
				exit;
			} else {
				$_SESSION['msg'] = "Error updating video: " . mysqli_error($conn);
				header("Location: " . $_SERVER['HTTP_REFERER']);
				exit;
			}
		} else {
			$_SESSION['msg'] = "File upload failed.";
			header("Location: " . $_SERVER['HTTP_REFERER']);
			exit;
		}
	} else {
		$_SESSION['msg'] = "Error uploading file: " . $uploadingfile['error'];
		header("Location: " . $_SERVER['HTTP_REFERER']);
		exit;
	}
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['addaboutpage'])) {

	$fp = $_POST['fp'];
	$sp = $_POST['sp'];
	$photo = $_FILES['image']['name'];

	// Handle file extension and name
	$photo = explode('.', $photo);
	$image = time() . $photo[0];
	$imagename = $_FILES['image']['tmp_name'];

	// Check if image was uploaded without error
	if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
		echo "Error uploading file: " . $_FILES['image']['error'];
		die();
	}

	// Get image dimensions
	list($width, $height) = getimagesize($imagename);

	// Directory for upload
	$dir = "uploads/image/";
	$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif");

	// Check image upload using custom function
	$check = Imageupload($dir, 'image', $allext, '5000000', '10000000', '10000000', $image);
	if ($check === true) {
		$image = $image . ".jpg";  // Assuming all images are saved as .jpg

		// Prepare the SQL query using prepared statements
		$query = "INSERT INTO `tbl_about` (`image`, `fp`, `sp`) VALUES (?, ?, ?)";

		// Prepare statement
		if ($stmt = $conn->prepare($query)) {
			// Bind parameters (s = string, i = integer, etc.)
			$stmt->bind_param("sss", $image, $fp, $sp);  // s = string, s = string, s = string

			// Execute the statement
			if ($stmt->execute()) {
				$_SESSION['msg'] = "About Added Successfully!";
				header('Location:add_about.php');
			} else {
				$_SESSION['msg'] = "Error: " . $stmt->error;
				header("location:$_SERVER[HTTP_REFERER]");
			}

			// Close the statement
			$stmt->close();
		} else {
			$_SESSION['msg'] = "Error preparing the query: " . $conn->error;
			header("location:$_SERVER[HTTP_REFERER]");
		}
	} else {
		$_SESSION['msg'] = $check;
		header("location:$_SERVER[HTTP_REFERER]");
	}
}



if (isset($_POST['addtestimonial'])) {
	$name = $_POST["name"];
	$profession = $_POST["profession"];
	$review = $_POST["review"];

	$sql = "INSERT INTO `testimonials` (`name`,`profession`,`review`) VALUES ('$name','$profession','$review')";
	if ($conn->query($sql) === TRUE) {
		header("location:$_SERVER[HTTP_REFERER]");
		$_SESSION['msg'] = "Message  Added Successfully !!!";
		header("location:testimonial.php");
	} else {
		$_SESSION['msg'] = "Message Not Added !!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
}

if (isset($_POST['submitcontact'])) {
	// echo '<pre>';
	// print_r($_POST);die;

	$name = $_POST["name"];
	$email = $_POST["email"];
	$subject = $_POST["subject"];
	$message = $_POST["message"];

	$sql = "INSERT INTO `contact` (`name`,`email`,`subject`,`message`) VALUES ('$name','$email','$subject','$message')";
	if ($conn->query($sql) === TRUE) {
		header("location:$_SERVER[HTTP_REFERER]");
		$_SESSION['msg'] = "Message  Added Successfully !!!";
		header("location:../index.php");
	} else {
		$_SESSION['msg'] = "Message Not Added !!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
}


if (isset($_POST['submitreview'])) {

	$name = $_POST['name'];
	$organization = $_POST['organization'];
	$designation = $_POST['designation'];
	$mnumber = $_POST['mnumber'];
	$email = $_POST['email'];
	$review = $_POST['review'];
	$photo = $_FILES['image']['name'];
	$photo = explode('.', $photo);
	$image = time() . $photo[0];
	$imagename = $_FILES['image']['tmp_name'];
	// echo '<pre>';
	// print_r($photo);die;
	list($width, $height) = getimagesize($_FILES['image']['tmp_name']);
	$dir = "uploads/image/";
	$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif");
	$check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);

	if ($check === true) {
		$image = $image . ".jpg";

		$query = "INSERT INTO `write_review` (`name`,`organization`,`designation`,`mnumber`,`email`,`review`,`image`) VALUES ('$name','$organization','$designation','$mnumber','$email','$review','$image')";
		$sql = mysqli_query($conn, $query);

		if ($sql) {
			header('Location:../index.php');
			$_SESSION['msg'] = "Review Uploaded !!!";
		} else {
			$_SESSION['msg'] = "Review Added Successfully !!!";
			header("location:$_SERVER[HTTP_REFERER]");
		}
	} else {
		$_SESSION['msg'] = $check;
		header("location:$_SERVER[HTTP_REFERER]");
	}
}
