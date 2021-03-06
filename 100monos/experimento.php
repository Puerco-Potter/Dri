<?php
		require('conexion.php');
		require('redireccion.php');
        
?>
<!DOCTYPE html>
<html class="h-100">
<head>
    <LINK href="bootstrap\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <style>
        body{
            width: 200000px !important;
            height: 200000px !important;
        }

        .hijos{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .nombre{
            color:red;
            border: 3px solid pink;
            margin-top:5px;
            margin-bottom:5px;
            width: 600px;
        }

        .cajon::before{
            height: 3px;
            content: "";
			width: 200px;
            border-bottom: 2px solid black;
            top:0;
            bottom:0;
            left:0;
        }

        .hijos > .cajon:first-child{
            border-left: 3px solid black;
            border-image: linear-gradient(to top, black 50%,rgba(108,219,141,0) 50%);
            border-image-slice: 1;
            overflow-x: auto;
        }

        .hijos > .cajon:last-child{
            border-left: 3px solid black;
            border-image: linear-gradient(to bottom, black 54%,rgba(108,219,141,0) 54%);
            border-image-slice: 1;
            overflow-x: auto;
        }

        .hijos > .cajon:only-child{
            border-left: none;
            border-image: none;
        }

        .delante{
            min-width: 200px;
            border-bottom: 3px solid black;
        }

        .cajon{
            flex-basis:1;
            flex-grow: 1;
            border-left: 3px solid black;
        }

        .cajon > .delante:last-child{
            width: 0 !important;
            min-width: 0 !important;
            flex-grow: 0 !important;
        }

        .raiz >  .delante{
            flex-grow: 0 !important;
        }

        .raiz >  .hijos{
            margin-left: 0 !important;
        }

        .raiz::before{
			width: 0px;
        }


    </style>
</head>



<body>
    <div class="d-flex justify-content-start cajon mayoro align-items-center raiz">
        <div class="nombre">Nombre Del tipo1</div>
        <div class="delante"></div>
        <div class="hijos">
            <div class="d-flex justify-content-start cajon align-items-center">
                <div class="nombre"><h1>Nombre Del tipo2</h1><h1>Nombre Del  sdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsd sdsd tipo2</h1><h1>Nombre Del tipo2</h1><h1>Nombre Del tipo2</h1><h1>Nombre Del tipo2</h1></div>
                <div class="delante"></div>
                <div class="hijos">
                        <div class="d-flex justify-content-start cajon align-items-center">
                            <div class="nombre">Nombre Del tipo2</div>
                            <div class="delante"></div>
                            
                        </div>
                        <div class="d-flex justify-content-start cajon align-items-center">
                            <div class="nombre">Nombre Del tipo2</div>
                            <div class="delante"></div>
                            
                        </div>
                        <div class="d-flex justify-content-start  cajon align-items-center">
                            <div class="nombre">Nombre Del tipo2</div>
                            <div class="delante"></div>
                            
                        </div>
                </div>
            </div>
            <div class="d-flex justify-content-start cajon align-items-center">
                <div class="nombre">Nombre Del tipo3</div>
                <div class="delante"></div>
            </div>
            <div class="d-flex justify-content-start cajon align-items-center">
                <div class="nombre">Nombre Del tipo3</div>
                <div class="delante"></div>
                <div class="hijos">
                    <div class="d-flex justify-content-start cajon align-items-center">
                        <div class="nombre">Nombre Del tipo2</div>
                        <div class="delante"></div>
                        
                    </div>
                    <div class="d-flex justify-content-start cajon align-items-center">
                        <div class="nombre">Nombre Del tipo2</div>
                        <div class="delante"></div>
                        <div class="hijos">
                                <div class="d-flex justify-content-start cajon align-items-center">
                                        <div class="nombre"><h1>Nombre Del tipo2</h1><h1>Nombre Del  sdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsd sdsd tipo2</h1><h1>Nombre Del tipo2</h1><h1>Nombre Del tipo2</h1><h1>Nombre Del tipo2</h1></div>
                                        <div class="delante"></div>
                                        <div class="hijos">
                                                <div class="d-flex justify-content-start cajon align-items-center">
                                                    <div class="nombre">Nombre Del tipo2</div>
                                                    <div class="delante"></div>
                                                    
                                                </div>
                                                <div class="d-flex justify-content-start cajon align-items-center">
                                                    <div class="nombre">Nombre Del tipo2</div>
                                                    <div class="delante"></div>
                                                    
                                                </div>
                                                <div class="d-flex justify-content-start  cajon align-items-center">
                                                    <div class="nombre">Nombre Del tipo2</div>
                                                    <div class="delante"></div>
                                                    
                                                </div>
                                        </div>
                                    </div>
                            <div class="d-flex justify-content-start cajon align-items-center">
                                <div class="nombre"><h1>Nombre Del tipo2</h1><h1>Nombre Del  sdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsd sdsd tipo2</h1><h1>Nombre Del tipo2</h1><h1>Nombre Del tipo2</h1><h1>Nombre Del tipo2</h1></div>
                                <div class="delante"></div>
                                <div class="hijos">
                                        <div class="d-flex justify-content-start cajon align-items-center">
                                            <div class="nombre">Nombre Del tipo2</div>
                                            <div class="delante"></div>
                                            <div class="hijos">
                                                    <div class="d-flex justify-content-start cajon align-items-center">
                                                            <div class="nombre"><h1>Nombre Del tipo2</h1><h1>Nombre Del  sdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsd sdsd tipo2</h1><h1>Nombre Del tipo2</h1><h1>Nombre Del tipo2</h1><h1>Nombre Del tipo2</h1></div>
                                                            <div class="delante"></div>
                                                            <div class="hijos">
                                                                    <div class="d-flex justify-content-start cajon align-items-center">
                                                                        <div class="nombre">Nombre Del tipo2</div>
                                                                        <div class="delante"></div>
                                                                        
                                                                    </div>
                                                                    <div class="d-flex justify-content-start cajon align-items-center">
                                                                        <div class="nombre">Nombre Del tipo2</div>
                                                                        <div class="delante"></div>
                                                                        
                                                                    </div>
                                                                    <div class="d-flex justify-content-start  cajon align-items-center">
                                                                        <div class="nombre">Nombre Del tipo2</div>
                                                                        <div class="delante"></div>
                                                                        
                                                                    </div>
                                                            </div>
                                                        </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-start cajon align-items-center">
                                            <div class="nombre">Nombre Del tipo2</div>
                                            <div class="delante"></div>
                                            
                                        </div>
                                        <div class="d-flex justify-content-start  cajon align-items-center">
                                            <div class="nombre">Nombre Del tipo2</div>
                                            <div class="delante"></div>
                                            
                                        </div>
                                </div>
                            </div>

                        </div>
                        
                    </div>
                    <div class="d-flex justify-content-start  cajon align-items-center">
                        <div class="nombre">Nombre Del tipo2</div>
                        <div class="delante"></div>
                        
                    </div>
            </div>
            </div>
            <div class="d-flex justify-content-start cajon align-items-center">
                <div class="nombre">Nombre Del tipo3</div>
                <div class="delante"></div>
            </div>
        </div>
    </div>

    //Aca empieza en serio

</body>
</html>