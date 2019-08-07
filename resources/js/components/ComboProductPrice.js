import React, { Component } from 'react'
import Select from 'react-select'
import PropTypes from 'prop-types'
import util from '../libs/util'

const styles = {
  container: (provided) => ({
    ...provided,
    height: '2.4rem',
    display: 'flex',
    flex: '1 1 auto'
  }),
  control: (provided) => ({
    ...provided,
    marginBottom: '1rem !important',
    position: 'relative',
    alignItems: 'stretch',
    height: '2.4rem',
    borderRadius: '4px 0 0 4px',
    width: '100%',
    display: 'flex',
    flex: '1 1 auto'
  })
}

export default class ComboProductPrice extends Component {

  static propTypes = {
    price: PropTypes.number,
    howMany: PropTypes.number,
    productQuantity: PropTypes.number
  }

  state = {
    price: this.props.price,
    howMany: this.props.howMany,
    productQuantity: this.props.productQuantity,
    totalPrice: util.formatCurrency(this.props.price)
  }

  handleChange = e => {
    let total = e.value * this.state.price
    this.setState({totalPrice: util.formatCurrency(total)})
  }

  handleOptions = howMany => {
    let optionItems = []
    for (let o = 1; o <= howMany; o++) {
      optionItems[o] = { value: o, label: o }
    }
    return optionItems
  }

  render() {

    return (

      <div>
        <p className="ss-product-price">{this.state.totalPrice}</p>
        <div className="input-group mb-3">
          <Select
            name="howMany"
            id="ss-product-multiply"
            styles={styles}
            value={this.state.value}
            onChange={this.handleChange}
            options={this.handleOptions(this.state.howMany)} />

          <div className="input-group-append">
            <label className="input-group-text" htmlFor="ss-product-multiply">x {this.state.productQuantity}</label>
          </div>
        </div>
      </div>

    )
  }
}
