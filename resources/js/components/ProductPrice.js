import React, { Component } from 'react'
import ReactDOM from 'react-dom'

export default class ProductPrice extends Component {

  state = {
    price: this.props.price,
    howMany: this.props.howMany,
    productQuantity: this.props.productQuantity,
    totalPrice: new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(this.props.price)
  }

  handleChange = e => {
    let total = e.target.value * this.state.price
    this.setState({totalPrice: new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(total)})
  }

  handleOptions = howMany => {
    let optionItems = []
    for (let o = 1; o <= howMany; o++) {
      optionItems.push(<option key={o} value={o}>{o}</option>)
    }
    return optionItems
  }

  render() {

    return (

      <div>
        <p className="ss-product-price">{this.state.totalPrice}</p>
        <div className="input-group mb-3">
          <select className="custom-select" id="ss-product-multiply" defaultValue="" onChange={this.handleChange}>
            <option key="0" value="">Choose...</option>
            {this.handleOptions(this.state.howMany)}
          </select>
          <div className="input-group-append">
            <label className="input-group-text" htmlFor="ss-product-multiply">x {this.state.productQuantity}</label>
          </div>
        </div>
      </div>

    )
  }

}

var ProductPriceComponent = document.getElementById('product-price-component')

if (ProductPriceComponent) {
  var data = ProductPriceComponent.dataset
  ReactDOM.render(
    <ProductPrice price={data.price} howMany={data.howMany} productQuantity={data.productQuantity} />,
    document.getElementById('product-price-component'))
}
