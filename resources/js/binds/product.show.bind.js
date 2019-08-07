import React from 'react'
import ReactDOM from 'react-dom'
import ComboProductPrice from '../components/ComboProductPrice'

var ProductPriceComponent = document.getElementById('ss-product-price-component')

if (ProductPriceComponent) {
  var data = ProductPriceComponent.dataset;
  ReactDOM.render(
    <ComboProductPrice price={Number(data.price)} howMany={Number(data.howMany)} productQuantity={Number(data.productQuantity)} />,
    ProductPriceComponent)
}
