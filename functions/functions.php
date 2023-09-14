<?php

    function getAbout()
    {
        include "db.php";

        $query = "SELECT * FROM about";

        $stmt = $connect->query($query);

        $result = $stmt->fetch();

        return $result;
    }
    
    function teamMember()
    {
        include "db.php";
    
        $query = "SELECT * FROM teammember";
    
        $stmt = $connect->query($query);
    
        $result = $stmt->fetchAll();
    
        return $result;

    }


    function getDatas($databaseName)
    {
        include "db.php";

        $tableName = ["about","teammember"];
        
        if(!in_array($databaseName,$tableName))
        {
            return 1;
        }
        
        $query = "SELECT * FROM $databaseName";

        $stmt = $connect->prepare($query);
        $stmt->execute();
        
        if($stmt->rowCount() == 1)
        {
            $result = $stmt->fetch();
        }
        else
        {
            $result = $stmt->fetchAll();
        }
        return $result;
    }

    function filter($content)
    {
        $result = trim($content);
        $result = strip_tags($result);

        return $result;
    }

    function    checkValue($userNick,$userPass)
    {
        include "db.php";

        $query = "SELECT * FROM users WHERE userName = :userName";

        $stmt = $connect->prepare($query);
        $stmt->execute([":userName"=>$userNick]);
        $result = $stmt->fetch();

        if($stmt->rowCount() == 1)
        {
            if($result["userPass"] == $userPass)
            {
                $_SESSION["message"] = "Başarılı bir şekilde giriş yaptınız";
                $_SESSION["color"] = "success";
                $_SESSION["login"] = "true";
                $_SESSION["id"] = $result["id"];

                if($result["isAdmin"] == 1)
                {
                    $_SESSION["admin"] = "true";
                    $_SESSION["active"] = checkActive($result["id"])["activate"]; 
                    header("Location:../adminLTE");
                    exit();
                }
                else
                {
                    $_SESSION["active"] = checkActive($result["id"])["activate"]; 
                    $_SESSION["admin"] = "false";
                    header("Location:../index.php");
                    exit();
                }

            }
            else
            {
                session_start();
                $_SESSION["message"] = "Şifre ya da kullanıcı adı yanlış";
                $_SESSION["color"] = "danger";
                header("Location:../login/login.php");
                exit();
            }
        }
        else
        {
            session_start();
            $_SESSION["message"] = "Böyle bir kullanıcı yok";
            $_SESSION["color"] = "danger";
            header("Location:../login/login.php");
            exit();
        }
    }

    function checkValueInfo($userNick,$userPass,$userMail)
    {
        include "db.php";

        $query = "SELECT * FROM users WHERE userMail = :userMail";
        $query2 = "SELECT * FROM users WHERE userName = :userName";


        $stmt = $connect->prepare($query);
        $stmt2 = $connect->prepare($query2);
        $stmt->execute([":userMail"=>$userMail]);
        $stmt2->execute([":userName"=>$userNick]);

        
        $result = $stmt->rowCount();
        $result2 = $stmt2->rowCount();

        if($result != 1 && $result2 != 1)
        {
            // $activationCode = activeCode();
            register($userNick,$userMail,$userPass);
            $_SESSION["id"] = getId($userNick);
            $_SESSION["message"] = "Kullanıcı oluşturuldu aktive etmek için " . '<a href="activateProfile.php">tıklayınız</a>';
            $_SESSION["color"] = "success";
        }
        else
        {
            if($result && $result2)
            {
                $_SESSION["message"] = "Bu mail ve kullanıcı adıyla daha önce profil oluşturuldu";
                $_SESSION["color"] = "danger";
                header("Location:../login/login.php");
                exit();
            }
            else if($result2 == 1)
            {
                session_start();
                $_SESSION["message"] = "Bu kullanıcı adı ile daha önce profil oluşturuldu";
                $_SESSION["color"] = "danger";
                header("Location:../login/login.php");
                exit();
            }
            else
            {
                session_start();
                $_SESSION["message"] = "Bu mail ile daha önce profil oluşturuldu";
                $_SESSION["color"] = "danger";
                header("Location:../login/login.php");
                exit();
            }
        }

    }

    function register($userNick,$userMail,$userPass)
    {
        include "db.php";

        $userNick = filter($userNick);
        $userMail = filter($userMail);
        $userPass = filter($userPass);

        $code = activeCode();

        $query = "INSERT INTO users(userName,userMail,userPass,activationCode) VALUES(:userNick,:userMail,:userPass,:activeCodes)";
        $stmt = $connect->prepare($query);
        $stmt->bindParam(":userNick",$userNick);
        $stmt->bindParam(":userMail",$userMail);
        $stmt->bindParam(":userPass",$userPass);
        $stmt->bindParam(":activeCodes",$code);
        $stmt->execute();

    }

    function activeCode()
    {
        $min = 100;
        $max = 999;
        $first = rand($min,$max);
        $second = rand($min,$max);
        

        $result = $first.$second;

        return $result;
    }

    function getId($userName="",$userMail="")
    {
        include "db.php";

        $query = "SELECT id FROM users WHERE userName = :userName OR userMail = :userMail";

        $stmt = $connect->prepare($query);
        $stmt->execute([":userName"=>$userName,":userMail"=>$userMail]);
        $result = $stmt->fetch();

        return $result;
    }

    function checkActiveCode($activationCode,$id)
    {
        include "db.php";

        $query = "SELECT * FROM users WHERE id=:idNo";
        $stmt = $connect->prepare($query);
        $stmt->execute([":idNo"=>$id]);

        $result = $stmt->fetch();
        $try = checkTry();
        if($result["activationCode"] == $activationCode)
        {
            $_SESSION["message"] = "Hesabınızı aktif hale getirdiniz";
            $_SESSION["color"] = "success";
            activeProfile(1);
            header("Location:../index.php");
            exit();
        }
        else
        {
            $try+=1;
            if($try == 3)
            {
                $try = 0;
                saveTry($try);
                $_SESSION["message"] = "Maksimum deneme hakkını geçtiniz. Yeni kod gönderildi";
                $_SESSION["color"] = "warning";
                $activationCode = activeCode();
                saveCode($activationCode);
            }
            else
            {
                $_SESSION["message"] = "Yanlış doğrulama kodu girdiniz";
                $_SESSION["color"] = "danger";
            }

            saveTry($try);
            header("Location:../login/activateProfile.php");
            exit();
        }
    }

    function checkTry()
    {
        include "db.php";

        $query = "SELECT * FROM users WHERE id=:idNo";
        $stmt = $connect->prepare($query);
        $stmt->execute([":idNo"=>$_SESSION["id"]]);

        $result = $stmt->fetch();
        return $result["try"];
    }

    function saveTry(int $try)
    {
        include "db.php";

        $query = "UPDATE users SET try=:tryNo WHERE id=:idNo";
        $stmt = $connect->prepare($query);
        $stmt->execute([":tryNo"=>$try,":idNo"=>$_SESSION["id"]]);
    }

    function saveCode($code)
    {
        include "db.php";

        $query = "UPDATE users SET activationCode = :activationCode WHERE id = :idNo";
        $stmt = $connect->prepare($query);

        $stmt->execute([":activationCode"=>$code,":idNo"=>$_SESSION["id"]]);
    }

    function activeProfile()
    {
        include "db.php";

        $query = "UPDATE users SET activate = 1 WHERE id = :idNo";
        $stmt = $connect->prepare($query);

        $stmt->execute([":idNo"=>$_SESSION["id"]]);
    }

    function checkActive(int $id)
    {
        include "db.php";

        $query = "SELECT users.userName,users.activate FROM users WHERE id = :idNo";

        $stmt = $connect->prepare($query);
        $stmt->execute([":idNo"=>$id]);

        $result = $stmt->fetch();

        return $result;
    }

    function getBlogs()
    {
        include "db.php";

        $query = "SELECT * FROM blogs";

        $stmt = $connect->query($query);
        $result = $stmt->fetchAll();

        return $result;
    }
    
    
    function getBlogsById($id)
    {
        include "db.php";

        $query = "SELECT b.id,b.blogTitle,b.blogSummary,b.blogContent,b.blogPic,b.categoryId,b.author,b.visible,b.date,t.memberName,t.memberPic,c.categoryName FROM blogs b INNER JOIN teammember t ON b.author = t.id INNER JOIN category c ON b.categoryId = c.id WHERE b.id = $id";
        $stmt = $connect->query($query);

        $result = $stmt->fetch();

        return $result;
        
    }
    
    function getMainId()
    {
        include "db.php";

        $query = "SELECT * FROM mainpage";

        $stmt = $connect->query($query);
        $result = $stmt->fetch();

        return $result;
    }

    function newBlogs()
    {
        include "db.php";

        $query = "SELECT * FROM blogs INNER JOIN category ON category.id = blogs.categoryId INNER JOIN teammember ON teammember.id = blogs.author ORDER BY blogs.id DESC LIMIT 3 ";

        $stmt = $connect->query($query);

        $result = $stmt->fetchAll();

        return $result;
    }

    
    function getAdminUser(int $id)
    {
        include "db.php";

        $query = "SELECT * FROM users INNER JOIN teammember ON users.isAdmin=teammember.admin INNER JOIN blogs ON blogs.author=teammember.id WHERE blogs.author = :idNo";

        $stmt = $connect->prepare($query);
        $stmt->execute([":idNo"=>$id]);

        $result = $stmt->fetchAll();

        return $result;
    }
    

    function getNumbers(int $id)
    {
        include "db.php";

        $query = "SELECT * FROM blogs";

        $stmt = $connect->query($query);

        $result = $stmt->fetchAll();

        $number = $stmt->rowCount();

        $query = "SELECT * FROM blogs WHERE id = :idNo";

        $stmt = $connect->prepare($query);
        $stmt->execute([":idNo"=>$id]);

        $result2 = $stmt->fetchAll();
        $number2 = $stmt->rowCount();

        $query = "SELECT * FROM blogcomment";

        $stmt = $connect->query($query);

        $commentNumber = $stmt->rowCount();

        $query = "SELECT * FROM users WHERE activate=1";
        
        $stmt = $connect->query($query);
        $activateUser = $stmt->rowCount();
        
        $query = "SELECT * FROM users";
        $stmt = $connect->query($query);
        $userNumber = $stmt->rowCount();


        return [$result,$number,$result2,$number2,$commentNumber,$activateUser,$userNumber]; 
    }

    function getAllBlogsWithTeam()
    {
        include "db.php";

        $query = "SELECT b.id,b.blogTitle,b.date,t.memberPic,b.visible,t.memberName,c.categoryName FROM blogs b INNER JOIN teammember t ON b.author=t.id INNER JOIN category c ON c.id = b.categoryId ORDER BY b.id ASC";

        $stmt = $connect->query($query);
        $result = $stmt->fetchAll();
        return $result;

    }


    function getBlogsMemberCategory(int $id)
    {
        include "db.php";
        $query = "SELECT * FROM blogs INNER JOIN teammember ON teammember.id = blogs.author INNER JOIN category ON category.id = blogs.categoryId WHERE blogs.id = :id";
        $stmt = $connect->prepare($query);
        $stmt->execute([":id"=>$id,":id"=>$id]);

        $result = $stmt->fetch();

        return $result;
    }

    function getComments(int $id)
    {
        include "db.php";

        $query = "SELECT * FROM blogcomment INNER JOIN users ON blogcomment.userId = users.id WHERE blogId = :idNo";
        $stmt = $connect->prepare($query);
        $stmt->execute([":idNo"=>$id]);

        $result = $stmt->fetchAll();
        $numberOfComment = $stmt->rowCount();

        return [$result,$numberOfComment];

    }

    function getCurrentAdminUser(int $id)
    {
        include "db.php";

        $query = "SELECT * FROM users u INNER JOIN teammember t ON u.isAdmin = t.admin WHERE u.id = :id";
        $stmt = $connect->prepare($query);
        $stmt->execute([":id"=>$id]);

        $result = $stmt->fetch();

        return $result;
    }

    function getCategory()
    {
        include "db.php";

        $query = "SELECT * FROM category";

        $stmt = $connect->query($query);
        $result = $stmt->fetchAll();

        return $result;
    }

    function addBlogs($blogTitle,$blogSum,$blogContent,$status,$picName,$category,$authorId)
    {
        include "db.php";

        $query = "INSERT INTO blogs(blogTitle,blogSummary,blogContent,visible,blogPic,categoryId,author) VALUES(:blogTitle,:blogSum,:blogContent,:statu,:blogPic,:category,:authorId)";
        
        $stmt = $connect->prepare($query);
        $stmt->execute([":blogTitle"=>$blogTitle,":blogSum"=>$blogSum,":blogContent"=>$blogContent,":statu"=>$status,":blogPic"=>$picName,":category"=>$category,"authorId"=>$authorId]);

        $result = $stmt->fetchAll();

        return $result;
    }

    function getTeamMember()
    {
        include "db.php";

        $query = "SELECT * FROM teammember";

        $stmt = $connect->query($query);

        $result = $stmt->fetchAll();

        return $result;
    }

    function updateBlogs($id,$blogTitle,$blogSum,$blogContent,$status,$filePic="",$category)
    {
        include "db.php";

        $query = "UPDATE blogs SET blogTitle = :blogTitle, blogSummary = :blogSum, blogContent = :blogCont, visible = :statu, blogPic = :filePic, categoryId = :category WHERE id = :idNo";

        $stmt = $connect->prepare($query);

        $stmt->execute([":blogTitle"=>$blogTitle,":blogSum"=>$blogSum,":blogCont"=>$blogContent,":statu"=>$status,"filePic"=>$filePic,":category"=>$category,":idNo"=>$id]);

        $result = $stmt->fetchAll();


        return $result;
    }

    function deleteBlogs(int $id)
    {
        include "db.php";

        $query = "DELETE FROM blogs WHERE id = $id";

        $stmt = $connect->query($query);

        $result = $stmt->fetchAll();

        return $result;
    }

    function udapteMainId($first,$second,$third,$fourth,$fifth,$sixth,$seventh)
    {
        include "db.php";
        $query = "UPDATE mainpage SET first = :first, second = :second, third = :third, fourth = :fourth, fifth = :fifth, sixth = :sixth, seventh = :seventh WHERE id=1";
        $stmt = $connect->prepare($query);
        // $stmt->execute(["first"=>$first]);
        $stmt->execute([":first"=>$first,":second"=>$second,":third"=>$third,":fourth"=>$fourth,":fifth"=>$fifth,":sixth"=>$sixth,":seventh"=>$seventh]);

        $result = $stmt->fetchAll();
        
        return $result;
    }

    function getUsers()
    {
        include "db.php";

        $query = "SELECT * FROM users";

        $stmt = $connect->query($query);

        $result = $stmt->fetchAll();

        return $result;
    }


    function getMessage()
    {
        include "db.php";

        $query = "SELECT * FROM contactmessage";

        $stmt = $connect->query($query);

        $result = $stmt->fetchAll();
        $numberMail = $stmt->rowCount();

        return [$result,$numberMail];
    }

    function addContact($name,$email,$subject,$message)
    {
        include "db.php";

        $query = "INSERT INTO contactmessage(contactName,contactSubject,contactMail,contactConten) VALUES (:name,:subject,:mail,:conten)";

        $stmt = $connect->prepare($query);
        $stmt->execute([":name"=>$name,":subject"=>$subject,":mail"=>$email,":conten"=>$message]);

        $result = $stmt->fetchAll();

        return $result;
    }

    function readContact($id)
    {
        echo "basıldı";
    }

    function navbarCategories()
    {
        include "db.php";

        $query = "SELECT * FROM category";

        $stmt = $connect->query($query);

        $result = $stmt->fetchAll();

        return $result;
    }

    function getBlogCategory($category)
    {
        include "db.php";

        $query = "SELECT * FROM category INNER JOIN blogs ON category.id = blogs.categoryId WHERE blogs.categoryId = $category";

        $stmt = $connect->query($query);
        $number = $stmt->rowCount();

        $result = $stmt->fetchAll();

        return [$result,$number];
    }

    function addComment($blogId,$userId,$comment)
    {
        include "db.php";

        $query = "INSERT INTO blogcomment(blogId,userId,blogComment) VALUES(:blogId,:userId,:blogComment)";

        $stmt = $connect->prepare($query);
        $stmt->execute([":blogId"=>$blogId,":userId"=>$userId,":blogComment"=>$comment]);

        $result = $stmt->fetchAll();

        return $result;
    }

?>