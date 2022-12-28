<?php
include('vendor/autoload.php');
require('init.php');

use App\Card;

$addCards = new Card('');
$addCards->setConnection($connection);
$cards = $addCards->getAll();

?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!-- main panel -->
    <div class="container">
        <div class="row">
            <h1 class="d-flex justify-content-center my-4"> Add Flashcards </h1>
            <hr>
        </div>
        <div class="row">

            <div class="col-8">
                <div id="scene" class="scene">
                    <div id="card" class="card">
                        <div class="card__face card__face--front text-center">front</div>
                        <div id="back" class="card__face card__face--back text-center">back</div>
                    </div>
                </div>

                <!-- Semi-working flip animation -->
                <!-- <div id="object" class="card shadow mb-5 bg-body rounded py-10">
            <div class="card__face card-body text-center">
              <h3 id="front" class="card-title">
                PDC10
              </h3>
            </div>
            <div class="card__face card-body text-center">
              <h3 id="back" class="card-title">
                Professional Domain Course 1
              </h3>
            </div>
          </div> -->

                <style>
                    #scene {
                        width: 800px;
                        height: 460px;
                        perspective: 1200px;
                    }

                    #card {
                        width: 100%;
                        height: 100%;
                        position: relative;
                        transition: transform 1s;
                        transform-style: preserve-3d;
                    }

                    .card__face {
                        position: absolute;
                        height: 100%;
                        width: 100%;
                        backface-visibility: hidden;
                    }

                    #back {
                        transform: rotateX(180deg);
                    }

                    #card.is-flipped {
                        transform: rotateX(180deg);
                    }
                </style>

                <script>
                    var card = document.querySelector('#card');
                    card.addEventListener('click', function() {
                        card.classList.toggle('is-flipped');
                    });
                </script>

                <?php foreach ($cards as $card) {  ?>
                    <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 18rem; height: 10rem;">
                        <div class="card-body text-center">
                            <h5 class="card-title mt-4"><?php echo $card['title'] ?></h5>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-4">
                <div class="vertical"></div>
                <form method="POST">
                    <div class="container ml-2">
                        <div class="mb-3">
                            <!-- placeholder value of 1 in set id !-->
                            <input type="hidden" class="form-control" name="set_id" value="1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Title / Term</label>
                            <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Information Technology">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description / Definition</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="card">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<style>
    .vertical {
        border-left: 1px solid grey;
        height: 500px;
        position: absolute;
        opacity: 50%;
    }
</style>
<?php
if (isset($_POST['card'])) {
    $cardInfo = new Card($_POST['set_id'], $_POST['title'], $_POST['description']);
    $cardInfo->setConnection($connection);
    $cardInfo->save();
    header("Location: card.php");
    exit();
}
?>

</html>