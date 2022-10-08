<style>
    body {
        overflow-x: hidden;
        font-family: "Open Sans";
        font-size: 14px;
    }

    .gry-bg{
        background-color: transparent; 
    }

    label,
    small,
    input,
    h1 {
        color: #333e48;
        letter-spacing: -0.025em;
    }

    label,
    small {
        font-weight: 700;
        margin-bottom: 1.3em;
    }

    .required {
        color: red;
        font-weight: 700;
        margin-left: 2px;
    }


/* Input fields  */
    .form-control {
        background: #fafafa;
        -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.1);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
        color: #888;
        height: 33px;
        outline: 0;
        border-radius: 1.571em;
        box-sizing: border-box;
        width: 92%;
    }
/* Input fields End*/
    .form-group {
        margin-bottom: 3rem;
    }

/* Submit button  */
    .submit-btn {
        font-size: 16px;
        padding: 5px 15px;
        line-height: inherit;
        height: inherit;
        border: 1px solid #ccc;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        background: #0085ba;
        border-color: #0073aa #006799 #006799;
        -webkit-box-shadow: 0 1px 0 #006799;
        box-shadow: 0 1px 0 #006799;
        color: #fff;
        font-weight: 700;
        text-decoration: none;
        text-shadow: 0 -1px 1px #006799, 1px 0 1px #006799, 0 1px 1px #006799,
            -1px 0 1px #006799;
    }
/* Submit button End  */

/* Products details start  */
    .pro {
        font-size: 1.429em;
        padding: 15px 0;
        border-bottom: 1px solid #dadada;
        margin-bottom: 40px;
        position: relative;
    }

    .pro:after {
        content: ' ';
        width: 83px;
        border-bottom: 2px solid transparent;
        display: block;
        position: absolute;
        bottom: -1px;
        border-color: #0787ea;
    }

    .product_list_widget {
        list-style: none;
        padding-left: 0;
        margin-bottom: 0;
    }

    .product_list_widget img {
        width: 75px;
        height: 75px;
        margin-right: 20px;
        float: left;
    }

    .product_list_widget .product-title {
        color: #0062bd;
        font-weight: 700;
        font-size: 1em;
        display: block;
        line-height: 1.2em;
    }

    .product_list_widget .electro-price {
        margin-top: 1.667em;
        display: block;
        margin-left: 95px;
    }

    .product_list_widget .amount {
        display: inline-block;
        font-size: 1.071em;
    }

    .product_list_widget>li {
        margin-bottom: 1.35em;
    }
    /* products details end  */
</style>