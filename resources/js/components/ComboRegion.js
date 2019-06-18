import React, { Component } from 'react'
import Select from 'react-select'

const optionsCountry = [
  { value: 'chocolate', label: 'Chocolate' },
  { value: 'strawberry', label: 'Strawberry' },
  { value: 'vanilla', label: 'Vanilla' },
]

export default class ComboRegion extends Component {
  constructor (props) {
    super(props);
    this.state = { country: '', region: '' }
  }

  selectCountry = (val) => {
    this.setState({ country: val })
  }

  selectRegion = (val) => {
    this.setState({ region: val })
  }

  render() {
    const { country, region } = this.state

    return (
      <div>
        <Select
          value={ country }
          onChange={ (val) => this.selectCountry(val) }
          options={ optionsCountry } />
        <Select
          onChange={ (val) => this.selectRegion(val) }
          options={ optionsCountry } />
      </div>
    )
  }
}
