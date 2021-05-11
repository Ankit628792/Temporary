<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KR | Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&family=Raleway:wght@400;500;600&family=Roboto+Slab:wght@300;400&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>*{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif}body{height:100vh;background:#eee}.prompt{text-align:center;font-size:2em;padding-top:10vh;color:#888;font-family:'Raleway',sans-serif}.navigation{position:fixed;width:60px;height:100%;background:#fff;transition:.5s;overflow:hidden;z-index:1}.navigation:hover,.navigation.active{width:270px}.navigation ul{margin-top:38px;position:absolute;top:0;left:0;width:100%}.navigation ul li{position:relative;width:100%;list-style:none}.navigation ul li:hover{background:#8665f7;transition:200ms}.navigation ul li a{position:relative;width:100%;display:flex;text-decoration:none;color:#000}.navigation ul li a .icon{position:relative;display:grid;place-items:center;min-width:60px;height:60px;line-height:60px;text-align:center}.navigation ul li a .title{position:relative;display:block;padding:0 10px;height:60px;line-height:60px;text-align:start;white-space:nowrap}.navigation ul li a .icon .fa{font-size:24px}.navigation ul li:hover a{color:#fff}.toggle{position:absolute;top:20px;right:20px;width:60px;height:60px;background:#8665f7;cursor:pointer;z-index:1}.toggle.active{background:#ea1d63}.toggle:before{content:'\f0c9';font-family:fontAwesome;position:absolute;width:100%;height:100%;line-height:60px;text-align:center;font-size:24px;color:#fff}.toggle.active:before{content:'\f00d'}@media (max-width:800px){.navigation{left:-60px}.navigation.active{left:0;width:100%}}.dashboard{width:80vw;height:80vh;position:absolute;bottom:85px;right:20px}.dashboard .filter{width:100%;display:flex;margin-bottom:20px}.dashboard .filter select{width:150px;padding:5px 10px;margin-left:20px;font-size:1.1em;color:#555;outline:none}.dashboard .filter .search__box{width:200px;display:flex;margin-left:20px;color:#666}.dashboard .filter .search__box input{padding:5px 10px;font-size:1em;width:160px;color:#666;outline:none;border:1px solid #777;border-right:none}.dashboard .filter .search__box i{height:100%;font-size:1.5rem}.dashboard .filter .search__box .btn{width:100%;height:100%;width:40px;background:#8665f7;color:#fff;display:grid;place-items:center;border-left:none;cursor:pointer}.survey__details{width:100%;height:100%;overflow:scroll;margin-top:1rem}.dashboard .survey__details::-webkit-scrollbar{display:none}.dashboard .survey__details{-ms-overflow-style:none;scrollbar-width:none}.table tbody tr{background-color:#fff;box-shadow:inset -5px 0 10px rgba(0,0,0,.1)}.table tbody tr:hover{background-color:#d3fff8;transition:.2s}.thead-col{background-color:#8665f7!important;color:#fff}.thead-col th{text-align:center;min-width:100px;font-family:'Raleway',sans-serif}th,td{text-align:center}a{text-decoration:none;color:#555}@media only screen and (max-width:800px){.dashboard{padding-top:40px;margin:auto;width:90vw}.dashboard .filter select{width:100px;padding:2px 4px;margin-left:10px;font-size:1em}.dashboard .filter .search__box input{padding:5px 10px;font-size:.9em}.dashboard .filter .search__box .btn{width:100%;height:100%;width:40px;height:40px}.dashboard .filter .search__box i{height:100%;font-size:1.5rem;transform:translate(-10px,0)}.dashboard .filter .search__box i{width:100%;height:100%;width:40px;height:40px}}@media only screen and (max-width:500px){.dashboard{height:85vh}.dashboard .filter{width:100%;display:inline-block;margin-bottom:20px}.dashboard .filter .search__box .btn{width:100%;height:100%;width:40px;height:40px}.dashboard .filter .search__box i{height:100%;font-size:1rem;transform:translate(-10px,0)}.dashboard .filter select{width:100px;padding:2px 4px;margin-left:10px;font-size:1em}.dashboard .filter .search__box{margin-top:10px;margin-left:10px;margin-bottom:-20px}.dashboard .filter .search__box .btn{width:100%;height:100%;width:40px;height:40px;display:grid;place-items:center}.dashboard .filter .search__box i{width:100%;height:100%;width:40px;font-size:1.3rem;height:40px}}.survey__details .table tr td{color:#333;font-weight:400;font-family:'Roboto Slab',serif}</style>
    </head>
<body>


    

<div class="navigation">
    <ul>
        <li>
            <a href="#">
                <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                <span class="title">Home</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                <span class="title">About</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><i class="fa fa-comment" aria-hidden="true"></i></span>
                <span class="title">Contact</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><i class="fa fa-cog" aria-hidden="true"></i></span>
                <span class="title">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="../logout.php">
                <span class="icon"><i class="fa fa-sign-out" aria-hidden="true"></i></span>
                <span class="title">Log Out</span>
            </a>
        </li>
    </ul>
</div>
<div class="toggle" onclick="toggleMenu()"></div>

    



    
<section>

    <div class="dashboard">


        
        <form action="/kr/Dashboard/index.php" method="POST">
            <div class="filter">
                <select name="Status" id="status">
                    <option value="">All</option>
                    <option value="1">Completed</option>
                    <option value="3">Quotafull</option>
                    <option value="2">Terminated</option>
                </select>
                <select name="ID" id="ids">
                    <option value="PID">PID</option>
                    <option value="UID">UID</option>
                </select>
                <div class="search__box">
                    <input type="text" placeholder="Search UID/PID" name="id" required>
                    <button type="submit" name="search" class="btn"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
        
        
        
        
        <div class="survey__details">
            <table class="table">
                <thead class="thead-col">
                    <tr>
                        <th scope="col">S no</th>
                <th scope="col">UID</th>
                <th scope="col">PID</th>
                <th scope="col">Date & Time</th>
                <th scope="col">IP ADDRESS</th>
                <th scope="col">SURVEY STATUS</th>
            </tr>
            </thead>
             
	<script>console.log('connection Successful');</script>

	                    <tbody>
                                    
                <tr>
                    <td>1</td>
                    <td>aaaa</td>
                    <td>bbbb</td>
                    <td>2020-10-29 04:00:07.000000</td>
                    <td>2405:204:329a:59fd:a78:6a4b:3c8c:fa47</td>
                    <td style="background-color: #ff6699;">TERMINATE</td>
                </tr>
                                
                <tr>
                    <td>2</td>
                    <td>56789</td>
                    <td>5468</td>
                    <td>2020-10-30 04:47:57.000000</td>
                    <td>2401:4900:b99:1c9f:29ec:470a:c95a:e571</td>
                    <td style="background-color: #ff6699;">TERMINATE</td>
                </tr>
                                
                <tr>
                    <td>3</td>
                    <td>4566</td>
                    <td>87987</td>
                    <td>2020-10-30 04:48:24.000000</td>
                    <td>2401:4900:b99:1c9f:29ec:470a:c95a:e571</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>4</td>
                    <td>4566</td>
                    <td>87987</td>
                    <td>2020-10-30 04:48:39.000000</td>
                    <td>2401:4900:b99:1c9f:29ec:470a:c95a:e571</td>
                    <td style="background-color: #ffcc66;">QUOTAFULL</td>
                </tr>
                                
                <tr>
                    <td>5</td>
                    <td>xxx</td>
                    <td>xxx</td>
                    <td>2020-10-30 04:53:46.000000</td>
                    <td>2401:4900:b99:1c9f:0:2e:4da8:df01</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>6</td>
                    <td></td>
                    <td>xxx</td>
                    <td>2020-10-30 04:54:29.000000</td>
                    <td>2401:4900:b99:1c9f:0:2e:4da8:df01</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>7</td>
                    <td>34</td>
                    <td>xxx</td>
                    <td>2020-10-30 04:54:31.000000</td>
                    <td>2401:4900:b99:1c9f:0:2e:4da8:df01</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>8</td>
                    <td>3456</td>
                    <td>xxx</td>
                    <td>2020-10-30 04:54:31.000000</td>
                    <td>2401:4900:b99:1c9f:0:2e:4da8:df01</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>9</td>
                    <td>345</td>
                    <td>xxx</td>
                    <td>2020-10-30 04:54:31.000000</td>
                    <td>2401:4900:b99:1c9f:0:2e:4da8:df01</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>10</td>
                    <td>3456</td>
                    <td></td>
                    <td>2020-10-30 04:54:32.000000</td>
                    <td>2401:4900:b99:1c9f:0:2e:4da8:df01</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>11</td>
                    <td>3456</td>
                    <td>45</td>
                    <td>2020-10-30 04:54:33.000000</td>
                    <td>2401:4900:b99:1c9f:0:2e:4da8:df01</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>12</td>
                    <td>3456</td>
                    <td>456</td>
                    <td>2020-10-30 04:54:33.000000</td>
                    <td>2401:4900:b99:1c9f:0:2e:4da8:df01</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>13</td>
                    <td>3456</td>
                    <td>4567</td>
                    <td>2020-10-30 04:54:34.000000</td>
                    <td>2401:4900:b99:1c9f:0:2e:4da8:df01</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>14</td>
                    <td>1234</td>
                    <td>6789</td>
                    <td>2020-10-30 04:58:09.000000</td>
                    <td>2401:4900:b99:1c9f:0:2e:4da8:df01</td>
                    <td style="background-color: #ff6699;">TERMINATE</td>
                </tr>
                                
                <tr>
                    <td>15</td>
                    <td>3456</td>
                    <td>4567</td>
                    <td>2020-10-30 05:09:05.000000</td>
                    <td>116.74.17.139</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>16</td>
                    <td>1234</td>
                    <td>6789</td>
                    <td>2020-10-30 05:09:23.000000</td>
                    <td>116.74.17.139</td>
                    <td style="background-color: #ff6699;">TERMINATE</td>
                </tr>
                                
                <tr>
                    <td>17</td>
                    <td>2345</td>
                    <td>5678</td>
                    <td>2020-10-30 05:09:30.000000</td>
                    <td>116.74.17.139</td>
                    <td style="background-color: #ffcc66;">QUOTAFULL</td>
                </tr>
                                
                <tr>
                    <td>18</td>
                    <td>2345</td>
                    <td>5678</td>
                    <td>2020-10-30 06:12:15.000000</td>
                    <td>2401:4900:b99:1c9f:0:2e:4da8:df01</td>
                    <td style="background-color: #ffcc66;">QUOTAFULL</td>
                </tr>
                                
                <tr>
                    <td>19</td>
                    <td>3456</td>
                    <td>4567</td>
                    <td>2020-11-04 09:12:15.000000</td>
                    <td>2409:4050:2e95:716c:601d:69c2:d104:b2e6</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>20</td>
                    <td>56789</td>
                    <td>5468</td>
                    <td>2020-11-05 10:57:33.000000</td>
                    <td>223.225.60.176</td>
                    <td style="background-color: #ff6699;">TERMINATE</td>
                </tr>
                                
                <tr>
                    <td>21</td>
                    <td>56789</td>
                    <td>5468</td>
                    <td>2020-11-05 10:58:04.000000</td>
                    <td>223.225.60.176</td>
                    <td style="background-color: #ffcc66;">QUOTAFULL</td>
                </tr>
                                
                <tr>
                    <td>22</td>
                    <td>124421</td>
                    <td>124421</td>
                    <td>2020-11-05 10:58:31.000000</td>
                    <td>223.225.60.176</td>
                    <td style="background-color: #ffcc66;">QUOTAFULL</td>
                </tr>
                                
                <tr>
                    <td>23</td>
                    <td>hutcvhyyPK</td>
                    <td>VL34345</td>
                    <td>2021-01-03 02:43:12.000000</td>
                    <td>103.99.196.69</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>24</td>
                    <td>xxx</td>
                    <td>xxx</td>
                    <td>2021-01-04 08:34:36.000000</td>
                    <td>103.99.197.22</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>25</td>
                    <td>xxx</td>
                    <td>xxx</td>
                    <td>2021-01-05 10:39:27.000000</td>
                    <td>103.79.170.122</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>26</td>
                    <td></td>
                    <td></td>
                    <td>2021-04-09 11:37:23.000000</td>
                    <td>2401:4900:47fc:7fa0:35ae:360e:b7cd:83f6</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>27</td>
                    <td>124</td>
                    <td>421</td>
                    <td>2021-04-09 11:40:38.000000</td>
                    <td>2401:4900:47fc:7fa0:35ae:360e:b7cd:83f6</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>28</td>
                    <td>124</td>
                    <td>421</td>
                    <td>2021-04-09 11:40:50.000000</td>
                    <td>2401:4900:47fc:7fa0:35ae:360e:b7cd:83f6</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>29</td>
                    <td>124</td>
                    <td>421</td>
                    <td>2021-04-09 11:41:55.000000</td>
                    <td>2401:4900:47fc:7fa0:0:b:22c4:9201</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>30</td>
                    <td>124</td>
                    <td>421</td>
                    <td>2021-04-09 11:42:07.000000</td>
                    <td>47.31.225.70</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>31</td>
                    <td>124</td>
                    <td>421</td>
                    <td>2021-04-09 11:42:13.000000</td>
                    <td>2401:4900:47fc:7fa0:35ae:360e:b7cd:83f6</td>
                    <td style="background-color: #ff6699;">TERMINATE</td>
                </tr>
                                
                <tr>
                    <td>32</td>
                    <td>124</td>
                    <td>421</td>
                    <td>2021-04-09 11:42:28.000000</td>
                    <td>2401:4900:47fc:7fa0:35ae:360e:b7cd:83f6</td>
                    <td style="background-color: #ffcc66;">QUOTAFULL</td>
                </tr>
                                
                <tr>
                    <td>33</td>
                    <td>6</td>
                    <td>3</td>
                    <td>2021-04-09 11:43:10.000000</td>
                    <td>47.31.225.70</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>34</td>
                    <td>124</td>
                    <td>421</td>
                    <td>2021-04-09 12:53:56.000000</td>
                    <td>47.31.225.70</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>35</td>
                    <td>124</td>
                    <td>421</td>
                    <td>2021-04-09 12:54:17.000000</td>
                    <td>47.31.225.70</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>36</td>
                    <td>124</td>
                    <td>421</td>
                    <td>2021-04-12 12:58:50.000000</td>
                    <td>122.162.124.30</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                                
                <tr>
                    <td>37</td>
                    <td>124</td>
                    <td>421</td>
                    <td>2021-04-24 11:33:51.000000</td>
                    <td>14.192.53.90</td>
                    <td style="background-color: #00ffcc;">COMPLETE</td>
                </tr>
                            
        </tbody>
    </table>
    
        </div>

     </div>
     
</section>


<script type="text/javascript">function toggleMenu(){let navigation=document.querySelector('.navigation');let toggle=document.querySelector('.toggle');navigation.classList.toggle('active');toggle.classList.toggle('active');}</script>








      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>