<?php
session_start();
if($_SESSION["user_id"] == 0){
    header("Location: login.php");
}
switch ($_SESSION["rol"]) {
    case 0:
        $grant = 0;
        break;
    case 1:
        $grant = 1;
        break;
    case 3:
        $grant = 1;
        break;
    case 5:
        $grant = 1;
        break;
    default:
        $grant = 0;
        break;
}
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>TDR | Layout</title>
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <!-- CSS Reset -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <!-- Milligram CSS minified -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <link rel="stylesheet" href="css/master.css">
    <!-- Exportar y manejar tablas -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>

    <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="column">
                <h5 class="mainTitle"><a href="index.php">TDR</a> | Layout</h5>
                <hr>
            </div>
            <div class="column">
                <div class="column menuOptions">
                    <a <?php if($_SESSION["rol"] == 5){echo "style='display:none;'";} ?> href="index.php">Inventario</a>
                    <a href="operative.php"> -- Operativos</a>
                    <!-- <a href="in.php">Nueva entrada</a> -- -->
                    <a <?php if($_SESSION["rol"] == 5){echo "style='display:none;'";} ?>  href="binnacle.php">-- Bitácora</a>
                    &nbsp;<form class="" action="logout.php" method="post">
                        <input style="position:relative;left:80%;top:-32px;margin-bottom:-30px;" class="button button-clear" type="submit" name="logout" value="Salir">
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="column">
            </div>
        </div>
    </div>

    <?php
    if($grant == 0){
        echo "<div class='container' >";
        echo "<div class='row' >";
        echo "<div class='column' >";
        echo "<h4>No cuentas con acceso a este módulo</h4>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
     ?>

     <div class="container">
         <div class="row">
             <div class="column">
                 <h3>Patio</h3>
                 <p>436 Vehíulos -- 88.61% de ocupación</p>
                 <!-- 492 -->
                 <p style="font-size:12px;margin-top:-20px;">Estimación aproximada</p>
                 <hr>
             </div>
         </div>
         <div class="row">
             <div class="column">
                 <p>Ubicar vehículos</p>
                 <form class="" action="map_search.php" method="post">
                     <fieldset>
                         <div class="row">
                             <div class="column">
                                 <input type="text" placeholder="No. BIEN">
                             </div>
                             <div class="column">
                                 <input type="text" placeholder="No. BIEN">
                             </div>
                             <div class="column">
                                 <input type="text" placeholder="No. BIEN">
                             </div>
                             <div class="column">
                                 <input type="text" placeholder="No. BIEN">
                             </div>
                             <div class="column">
                                 <input type="text" placeholder="No. BIEN">
                             </div>
                             <div class="column">
                                 <input type="text" placeholder="No. BIEN">
                             </div>
                             <div class="column">
                                 <input type="text" placeholder="No. BIEN">
                             </div>
                             <div class="column">
                                 <input type="text" placeholder="No. BIEN">
                             </div>
                             <div class="column">
                                 <input type="text" placeholder="No. BIEN">
                             </div>
                             <div class="column">
                                 <input type="text" placeholder="No. BIEN">
                             </div>
                         </div>
                         <div class="row">
                             <div class="column">
                                 <input class="button-primary" type="submit" value="Buscar">
                             </div>
                         </div>
                     </fieldset>
                 </form>
                 <hr>
             </div>
         </div>
     </div>

    <div class="container" <?php if($grant == 0){echo "style='display:none;'";} ?>>
        <div class="row">
            <div class="column">
                <h4><b>Municipio</b></h4>
                <p style="margin-top:-20px;">28 vehiculos</p>
                <table id="grid">
                    <thead>
                        <tr>
                            <th></th>
                            <th>A</th>
                            <th>B</th>
                            <th>C</th>
                            <th>D</th>
                            <th>E</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>21</b></td>
                            <td>2797315</td>
                            <td>2831947</td>
                            <td>2832119</td>
                            <td>2838040</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>20</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>19</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2831950</td>
                        </tr>
                        <tr>
                            <td><b>18</b></td>
                            <td>2799960</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2802199</td>
                        </tr>
                        <tr>
                            <td><b>17</b></td>
                            <td>2754585</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>16</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>15</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2834415</td>
                        </tr>
                        <tr>
                            <td><b>14</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>13</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>12</b></td>
                            <td>2828363</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2777684</td>
                        </tr>
                        <tr>
                            <td><b>11</b></td>
                            <td>2769573</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>10</b></td>
                            <td>2828093</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2749931</td>
                        </tr>
                        <tr>
                            <td><b>9</b></td>
                            <td>2762244</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2770809</td>
                        </tr>
                        <tr>
                            <td><b>8</b></td>
                            <td>2810179</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2763718</td>
                        </tr>
                        <tr>
                            <td><b>7</b></td>
                            <td>2828282</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2770794</td>
                        </tr>
                        <tr>
                            <td><b>6</b></td>
                            <td>2819248</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>5</b></td>
                            <td>2828421</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>4</b></td>
                            <td>2775530</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2758403</td>
                        </tr>
                        <tr>
                            <td><b>3</b></td>
                            <td>2777681</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2838055</td>
                        </tr>
                        <tr>
                            <td><b>2</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2813535</td>
                        </tr>
                        <tr>
                            <td><b>1</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2786522</td>
                        </tr>
                        <!-- <?php
                        //tomamos los datos del archivo conexion.php
                        require("connect.php");
                        $sql = "SELECT * FROM operative ORDER BY id_operative DESC";
                        //se envia la consulta
                        $result=$mysqli->query($sql);
                        $rows = $result->num_rows;
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<tr>';
                            echo '<td><a href="operative_detail.php?code='.$row['id_operative'].'&id='.$row['id'].'">'.$row['id_operative'].'</a></td>';
                            echo '<td>'.$row['initial_date'].'</td>';
                            echo '<td>'.$row['final_date'].'</td>';
                            echo '</tr>';
                        }
                        ?> -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <h4><b>Venta</b></h4>
                <p style="margin-top:-20px;">408 Vehículos</p>
                <table id="grid">
                    <thead>
                        <tr>
                            <th></th>
                            <th>A</th>
                            <th>B</th>
                            <th>C</th>
                            <th>D</th>
                            <th>E</th>
                            <th>F</th>
                            <th>G</th>
                            <th>H</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>60</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>59</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>58</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>57</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2747270</td>
                        </tr>
                        <tr>
                            <td><b>56</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2841033</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>55</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2838862</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>54</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2839296</td>
                            <td>2839298</td>
                            <td>2803981</td>
                        </tr>
                        <tr>
                            <td><b>53</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2838783</td>
                            <td>2838801</td>
                            <td>2778217</td>
                        </tr>
                        <tr>
                            <td><b>52</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2753336</td>
                            <td></td>
                            <td>2844451</td>
                            <td>2828484</td>
                            <td>2819240</td>
                        </tr>
                        <tr>
                            <td><b>51</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2802195</td>
                            <td></td>
                            <td>2838820</td>
                            <td>2819422</td>
                            <td>2806836</td>
                        </tr>
                        <tr>
                            <td><b>50</b></td>
                            <td></td>
                            <td></td>
                            <td>2838798</td>
                            <td>2802202</td>
                            <td></td>
                            <td>2838784</td>
                            <td>2750371</td>
                            <td>2838880</td>
                        </tr>
                        <tr>
                            <td><b>49</b></td>
                            <td></td>
                            <td></td>
                            <td>2838799</td>
                            <td>2782262</td>
                            <td></td>
                            <td></td>
                            <td>2818841</td>
                            <td>2817704</td>
                        </tr>
                        <tr>
                            <td><b>48</b></td>
                            <td></td>
                            <td></td>
                            <td>2840935</td>
                            <td>2754602</td>
                            <td>2818919</td>
                            <td>2819480</td>
                            <td>2840937</td>
                            <td>2810195</td>
                        </tr>
                        <tr>
                            <td><b>47</b></td>
                            <td></td>
                            <td></td>
                            <td>2838860</td>
                            <td></td>
                            <td>2801718</td>
                            <td>2828134</td>
                            <td>2799360</td>
                            <td>2819335</td>
                        </tr>
                        <tr>
                            <td><b>46</b></td>
                            <td></td>
                            <td></td>
                            <td>2839337</td>
                            <td>2802204</td>
                            <td>2828379</td>
                            <td>2830421</td>
                            <td>2799925</td>
                            <td>2838867</td>
                        </tr>
                        <tr>
                            <td><b>45</b></td>
                            <td></td>
                            <td></td>
                            <td>2838805</td>
                            <td>2832063</td>
                            <td>2828289</td>
                            <td>2790782</td>
                            <td>2821641</td>
                            <td>2828392</td>
                        </tr>
                        <tr>
                            <td><b>44</b></td>
                            <td></td>
                            <td></td>
                            <td>2832027</td>
                            <td>2838073</td>
                            <td>2833161</td>
                            <td>2817702</td>
                            <td>2840512</td>
                            <td>2828371</td>
                        </tr>
                        <tr>
                            <td><b>43</b></td>
                            <td></td>
                            <td>2816876</td>
                            <td>2819253</td>
                            <td>2802236</td>
                            <td>2828358</td>
                            <td>2844006</td>
                            <td>2799938</td>
                            <td>2830027</td>
                        </tr>
                        <tr>
                            <td><b>42</b></td>
                            <td></td>
                            <td>2816363</td>
                            <td>2816417</td>
                            <td></td>
                            <td>2828169</td>
                            <td>2819342</td>
                            <td>2818927</td>
                            <td>2757207</td>
                        </tr>
                        <tr>
                            <td><b>41</b></td>
                            <td>2844406</td>
                            <td>2816100</td>
                            <td>2816162</td>
                            <td>2810279</td>
                            <td>2827475</td>
                            <td>2828092</td>
                            <td></td>
                            <td>2810401</td>
                        </tr>
                        <tr>
                            <td><b>40</b></td>
                            <td>2844405</td>
                            <td>2816874</td>
                            <td>2816467</td>
                            <td>2803550</td>
                            <td>2806843</td>
                            <td>2830056</td>
                            <td>2790769</td>
                            <td>2838872</td>
                        </tr>
                        <tr>
                            <td><b>39</b></td>
                            <td>2844772</td>
                            <td>2816562</td>
                            <td>2816346</td>
                            <td>2744688</td>
                            <td>2819343</td>
                            <td>2724819</td>
                            <td>2840934</td>
                            <td>2818840</td>
                        </tr>
                        <tr>
                            <td><b>38</b></td>
                            <td>2804356</td>
                            <td>2816365</td>
                            <td>2816341</td>
                            <td></td>
                            <td>2819246</td>
                            <td>2724814</td>
                            <td>2830031</td>
                            <td>2819344</td>
                        </tr>
                        <tr>
                            <td><b>37</b></td>
                            <td>2803977</td>
                            <td>2816121</td>
                            <td>2816095</td>
                            <td>2838059</td>
                            <td>2818921</td>
                            <td>2838914</td>
                            <td>2840932</td>
                            <td>2817701</td>
                        </tr>
                        <tr>
                            <td><b>36</b></td>
                            <td>2804422</td>
                            <td>2816474</td>
                            <td>2816876</td>
                            <td>2828140</td>
                            <td>2790780</td>
                            <td>2840812</td>
                            <td>2764676</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>35</b></td>
                            <td>2804403</td>
                            <td>2816155</td>
                            <td>2816553</td>
                            <td>2819336</td>
                            <td>2829042</td>
                            <td>2840899</td>
                            <td>2799603</td>
                            <td>2828381</td>
                        </tr>
                        <tr>
                            <td><b>34</b></td>
                            <td>2804414</td>
                            <td>2816344</td>
                            <td>2816088</td>
                            <td>2816855</td>
                            <td>2815550</td>
                            <td>2830021</td>
                            <td>2799934</td>
                            <td>2819339</td>
                        </tr>
                        <tr>
                            <td><b>33</b></td>
                            <td>2804391</td>
                            <td>2803577</td>
                            <td>2816879</td>
                            <td>2828388</td>
                            <td>2720008</td>
                            <td>2845611</td>
                            <td>2799605</td>
                            <td>2818925</td>
                        </tr>
                        <tr>
                            <td><b>32</b></td>
                            <td>2804406</td>
                            <td></td>
                            <td>2803569</td>
                            <td>2828353</td>
                            <td>2819221</td>
                            <td>2794946</td>
                            <td>2829974</td>
                            <td>2799602</td>
                        </tr>
                        <tr>
                            <td><b>31</b></td>
                            <td>2840929</td>
                            <td></td>
                            <td>2757229</td>
                            <td>2796524</td>
                            <td>2750282</td>
                            <td>2840936</td>
                            <td>2839329</td>
                            <td>2777898</td>
                        </tr>
                        <tr>
                            <td><b>30</b></td>
                            <td>2750332</td>
                            <td>2806834</td>
                            <td>2806839</td>
                            <td>2797277</td>
                            <td>2807134</td>
                            <td>2839335</td>
                            <td>2838802</td>
                            <td>2838052</td>
                        </tr>
                        <tr>
                            <td><b>29</b></td>
                            <td></td>
                            <td>2816707</td>
                            <td>2810334</td>
                            <td>2790408</td>
                            <td>2812194</td>
                            <td>2821363</td>
                            <td>2840933</td>
                            <td>2821623</td>
                        </tr>
                        <tr>
                            <td><b>28</b></td>
                            <td>2829153</td>
                            <td>2818219</td>
                            <td>2838064</td>
                            <td>2821593</td>
                            <td>2810085</td>
                            <td>2831040</td>
                            <td>2838797</td>
                            <td>2833142</td>
                        </tr>
                        <tr>
                            <td><b>27</b></td>
                            <td>2816085</td>
                            <td>2803572</td>
                            <td>2806854</td>
                            <td>2832350</td>
                            <td>2821643</td>
                            <td>2845559</td>
                            <td>2838815</td>
                            <td>2818920</td>
                        </tr>
                        <tr>
                            <td><b>26</b></td>
                            <td>2804917</td>
                            <td>2803458</td>
                            <td>2813461</td>
                            <td>2821581</td>
                            <td>2813450</td>
                            <td>2845651</td>
                            <td>2750287</td>
                            <td>2786657</td>
                        </tr>
                        <tr>
                            <td><b>25</b></td>
                            <td>2808307</td>
                            <td>2806856</td>
                            <td>2810405</td>
                            <td>2831042</td>
                            <td>2839200</td>
                            <td>2818830</td>
                            <td>2839913</td>
                            <td>2733295</td>
                        </tr>
                        <tr>
                            <td><b>24</b></td>
                            <td>2771773</td>
                            <td></td>
                            <td>2814601</td>
                            <td>2832004</td>
                            <td>2830028</td>
                            <td>2830069</td>
                            <td>2839288</td>
                            <td>2780590</td>
                        </tr>
                        <tr>
                            <td><b>23</b></td>
                            <td></td>
                            <td>2806846</td>
                            <td>2814598</td>
                            <td>2838068</td>
                            <td>2821426</td>
                            <td>2828339</td>
                            <td>2838873</td>
                            <td>2819478</td>
                        </tr>
                        <tr>
                            <td><b>22</b></td>
                            <td></td>
                            <td>2803546</td>
                            <td>2802205</td>
                            <td>2832928</td>
                            <td>2828314</td>
                            <td>2729253</td>
                            <td>2840900</td>
                            <td>2830504</td>
                        </tr>
                        <tr>
                            <td><b>21</b></td>
                            <td></td>
                            <td>2816697</td>
                            <td>2745873</td>
                            <td>2833141</td>
                            <td>2802237</td>
                            <td>2845558</td>
                            <td>2838874</td>
                            <td>2829041</td>
                        </tr>
                        <tr>
                            <td><b>20</b></td>
                            <td></td>
                            <td>2804021</td>
                            <td>2802208</td>
                            <td>2762529</td>
                            <td>2830040</td>
                            <td>2818837</td>
                            <td>2832060</td>
                            <td>2821638</td>
                        </tr>
                        <tr>
                            <td><b>19</b></td>
                            <td></td>
                            <td>2804863</td>
                            <td>2806833</td>
                            <td>2832347</td>
                            <td>2803439</td>
                            <td>2799950</td>
                            <td>2831948</td>
                            <td>2830053</td>
                        </tr>
                        <tr>
                            <td><b>18</b></td>
                            <td></td>
                            <td>2802226</td>
                            <td></td>
                            <td>2832006</td>
                            <td>2844906</td>
                            <td>2828394</td>
                            <td>2832059</td>
                            <td>2799527</td>
                        </tr>
                        <tr>
                            <td><b>17</b></td>
                            <td></td>
                            <td></td>
                            <td>2831039</td>
                            <td>2804970</td>
                            <td>2747653</td>
                            <td>2828136</td>
                            <td>2832026</td>
                            <td>2828477</td>
                        </tr>
                        <tr>
                            <td><b>16</b></td>
                            <td></td>
                            <td></td>
                            <td>2831548</td>
                            <td>2832351</td>
                            <td>2819203</td>
                            <td>2829956</td>
                            <td>2833194</td>
                            <td>2777918</td>
                        </tr>
                        <tr>
                            <td><b>15</b></td>
                            <td>2771772</td>
                            <td>2806835</td>
                            <td>2831533</td>
                            <td>2820724</td>
                            <td>2779496</td>
                            <td>2819477</td>
                            <td>2831946</td>
                            <td>2830030</td>
                        </tr>
                        <tr>
                            <td><b>14</b></td>
                            <td>2757389</td>
                            <td></td>
                            <td>2832097</td>
                            <td></td>
                            <td>2819338</td>
                            <td>2777896</td>
                            <td>2832069</td>
                            <td>2830294</td>
                        </tr>
                        <tr>
                            <td><b>13</b></td>
                            <td>2750345</td>
                            <td>2818185</td>
                            <td></td>
                            <td>2803456</td>
                            <td>2802228</td>
                            <td>2778178</td>
                            <td>2834429</td>
                            <td>2828174</td>
                        </tr>
                        <tr>
                            <td><b>12</b></td>
                            <td>2750326</td>
                            <td></td>
                            <td>2832002</td>
                            <td>2803457</td>
                            <td>2804865</td>
                            <td>2828273</td>
                            <td>2833958</td>
                            <td>2819214</td>
                        </tr>
                        <tr>
                            <td><b>11</b></td>
                            <td>2750333</td>
                            <td>2782280</td>
                            <td></td>
                            <td>2816873</td>
                            <td>2821642</td>
                            <td>2839297</td>
                            <td>2831951</td>
                            <td>2799946</td>
                        </tr>
                        <tr>
                            <td><b>10</b></td>
                            <td>2810399</td>
                            <td></td>
                            <td>2780975</td>
                            <td></td>
                            <td>********</td>
                            <td>2828436</td>
                            <td>2831952</td>
                            <td>2831550</td>
                        </tr>
                        <tr>
                            <td><b>9</b></td>
                            <td></td>
                            <td>2816701</td>
                            <td>2838818</td>
                            <td>2830727</td>
                            <td>********</td>
                            <td>2828138</td>
                            <td>2831038</td>
                            <td>2844861</td>
                        </tr>
                        <tr>
                            <td><b>8</b></td>
                            <td></td>
                            <td>2817015</td>
                            <td>2798802</td>
                            <td>2758364</td>
                            <td>2769760</td>
                            <td>2828215</td>
                            <td>2838072</td>
                            <td>2799604</td>
                        </tr>
                        <tr>
                            <td><b>7</b></td>
                            <td></td>
                            <td>2817017</td>
                            <td>2798973</td>
                            <td>2762302</td>
                            <td>2817697</td>
                            <td>2830043</td>
                            <td>2838075</td>
                            <td>2780707</td>
                        </tr>
                        <tr>
                            <td><b>6</b></td>
                            <td>2804251</td>
                            <td>2818137</td>
                            <td>2844007</td>
                            <td>2819341</td>
                            <td>2802203</td>
                            <td>2828364</td>
                            <td>2831549</td>
                            <td>2670928</td>
                        </tr>
                        <tr>
                            <td><b>5</b></td>
                            <td>2750369</td>
                            <td></td>
                            <td>277757</td>
                            <td>2819337</td>
                            <td>2810340</td>
                            <td>2819232</td>
                            <td>2833961</td>
                            <td>2829971</td>
                        </tr>
                        <tr>
                            <td><b>4</b></td>
                            <td>2804419</td>
                            <td>2816703</td>
                            <td></td>
                            <td>2819340</td>
                            <td>2810411</td>
                            <td>2821356</td>
                            <td>2832003</td>
                            <td>2838050</td>
                        </tr>
                        <tr>
                            <td><b>3</b></td>
                            <td>2804417</td>
                            <td></td>
                            <td>2838062</td>
                            <td>2731366</td>
                            <td>2828171</td>
                            <td>2828466</td>
                            <td>2831953</td>
                            <td>Sin folio</td>
                        </tr>
                        <tr>
                            <td><b>2</b></td>
                            <td>2884416</td>
                            <td></td>
                            <td>2838790</td>
                            <td>2821640</td>
                            <td>2818208</td>
                            <td>2818842</td>
                            <td>2832062</td>
                            <td>25017007</td>
                        </tr>
                        <tr>
                            <td><b>1</b></td>
                            <td>2804418</td>
                            <td></td>
                            <td>2838804</td>
                            <td>2830720</td>
                            <td>2828177</td>
                            <td>2828333</td>
                            <td>2832079</td>
                            <td>2786485</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="column">
                <br><br><hr>
                <p style="font-size:10px;margin-top:-20px;">Desarrollado por <a href="http://proyectoalis.com">Jesus Arciniega</a> &copy; 2017</p>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    $( document ).ready(function() {
        $('#grid').DataTable({
            "processing": true,
            "dom": 'lBfrtip',
            "buttons": [
                {
                    extend: 'collection',
                    text: 'Exportar',
                    buttons: [
                        'copy',
                        'excel',
                        'csv',
                        'pdf',
                        'print'
                    ]
                }
            ],
            "order": [[ 0, "desc" ]],
            "oLanguage": {
                "sSearch": "",
                "sLengthMenu": "Ver _MENU_ ",
                'sSearchPlaceholder': 'Buscar...',
                "oPaginate":{
                    "sPrevious" : "Anterior",
                    "sNext" : "Siguiente"
                },
                "sInfo": "Mostrando _START_ al _END_ de _TOTAL_ registros",
            },
            "dataTables_filter" {
                "display": "none"
            }
        });
    });
    </script>

</body>
</html>
