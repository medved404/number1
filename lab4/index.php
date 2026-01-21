<!DOCTYPE html> 
<html lang="ru"> 
<head> 
    <!-- Required meta tags always come first --> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <meta http-equiv="x-ua-compatible" content="ie=edge"> 
    <!-- Bootstrap CSS --> 
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
</head> 
<body> 
    <header> 
        <!-- Fixed navbar --> 
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> 
            <a class="navbar-brand" href="#">Лабораторная работа №4</a> 
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> 
                <span class="navbar-toggler-icon"></span> 
            </button> 
            <div class="collapse navbar-collapse" id="navbarCollapse"> 
                <ul class="navbar-nav mr-auto"> 
                </ul> 
                <form class="form-inline mt-2 mt-md-0"> 
                    <input class="form-control mr-sm-2" type="text" placeholder="Поиск" aria-label="Поиск"> 
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button> 
                </form> 
            </div> 
        </nav> 
    </header> 
    
    <!-- Begin page content --> 
    <main role="main" class="container"> 
        <h1 class="mt-5">Вычислить площадь треугольника со сторонами A, B, C и определить, является ли данный треугольник равносторонним.</h1> 
        
        <form method="POST"> 
            <div class="form-group"> 
                <label for="sideA">Введите сторону A:</label> 
                <input type="number" step="0.01" min="0.01" class="form-control" name="A" id="sideA" placeholder="Сторона A" required> 
            </div> 
            <div class="form-group"> 
                <label for="sideB">Введите сторону B:</label> 
                <input type="number" step="0.01" min="0.01" class="form-control" name="B" id="sideB" placeholder="Сторона B" required> 
            </div> 
            <div class="form-group"> 
                <label for="sideC">Введите сторону C:</label> 
                <input type="number" step="0.01" min="0.01" class="form-control" name="C" id="sideC" placeholder="Сторона C" required> 
            </div> 
            <p></p> 
            <div> 
                <button type="submit" class="btn btn-primary" name="submit" id="button_rez">Вычислить</button> 
            </div> 
        </form> 
        
        <div class="mydiv1"> 
            <h2> 
                <?php 
                    if (isset($_POST['submit'])) {
                        
                        $a = floatval($_POST['A']);
                        $b = floatval($_POST['B']);
                        $c = floatval($_POST['C']);
                        
                        echo "<h3>Результат:</h3>";
                        echo "Стороны треугольника: A = $a, B = $b, C = $c<br><br>";
                        
                        // Проверка на положительные значения
                        if ($a <= 0 || $b <= 0 || $c <= 0) {
                            echo "<span style='color: red;'>Ошибка: Все стороны должны быть положительными числами!</span>";
                        } 
                        // Проверка на существование треугольника
                        else if ($a + $b <= $c || $a + $c <= $b || $b + $c <= $a) {
                            echo "<span style='color: red;'>Треугольник с такими сторонами не существует!</span>";
                        } 
                        else {
                            // Вычисление площади по формуле Герона
                            $p = ($a + $b + $c) / 2; // полупериметр
                            $area = sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));
                            
                            // Форматирование площади (2 знака после запятой)
                            $area_formatted = number_format($area, 2, '.', '');
                            
                            // Проверка на равносторонность
                            $is_equilateral = false;
                            if (abs($a - $b) < 0.0001 && abs($b - $c) < 0.0001) {
                                $is_equilateral = true;
                            }
                            
                            // Вывод результатов
                            echo "<strong>Площадь треугольника:</strong> $area_formatted кв.ед.<br>";
                            echo "Формула Герона: S = √[p(p-a)(p-b)(p-c)], где p = ($a + $b + $c)/2 = $p<br><br>";
                            
                            if ($is_equilateral) {
                                echo "<span style='color: green;'><strong>Треугольник является равносторонним</strong></span><br>";
                                echo "Все стороны равны: A = B = C = $a";
                            } else {
                                echo "<span style='color: orange;'><strong>Треугольник не является равносторонним</strong></span><br>";
                                echo "Стороны не равны между собой";
                            }
                        }
                    }
                ?> 
            </h2> 
        </div>
    </main> 
    
    <footer class="footer"> 
        <!-- Можно добавить подвал если нужно -->
    </footer> 
</body> 
</html>