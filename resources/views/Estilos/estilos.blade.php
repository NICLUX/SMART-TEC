<style>
    /**
   /*---------------------------- ESTILO DE TARJETAS ---------------------------------------------
    */
    *{
        box-sizing: border-box;
    }
    section{
        width: 100%;
        display: flex;
        justify-content: space-around;
    }
    .estilo-a .card-body{
        width: 80%;

    }
    .estilo-a{
        font-family: sans-serif;
    }
    .estilo-a .img-container .card-img-top{
        overflow: hidden;
        width: 30%;
        height: 33.33333%;
        position: relative;
    }

    .estilo-a .img-container img {

        width: 30%;
        top: -25%;
        transition: all 0.5s;
    }
    .estilo-a:hover .img-container img{
        transform: scale(1,2);
    }

    /**
   /*---------------------------- ESTILO DE TARJETAS ---------------------------------------------
    */

</style>
