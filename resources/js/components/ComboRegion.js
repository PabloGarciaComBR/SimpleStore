import React, { Component } from 'react'
import Select from 'react-select'
import api from '../services/api'

export default class ComboRegion extends Component {
  constructor (props) {
    super(props);
    this.state = {
      country: "",
      state: "",
      city: "",
      optionsCountry: [],
      optionsState: [],
      optionsCity: []
    }
  }

  selectCountry = async (val) => {
    const response = await api.get("region/find/state/" + val.value)
    this.setState({ country: val, state: "", city: "", optionsState: response.data, optionsCity: "" })
  }

  selectState = async (val) => {
    const response = await api.get("region/find/city/" + val.value)
    this.setState({ state: val, city: "", optionsCity: response.data })
  }

  selectCity = (val) => {
    this.setState({ city: val })
  }

  async componentDidMount() {
    const response = await api.get("region/find/country")
    this.setState({ optionsCountry: response.data })
  }

  render() {
    return (
      <div className="row">

        <div className="col-md-4 mb-3">
          <label htmlFor="country">Country</label>
          <Select
            options={this.state.optionsCountry}
            onChange={ (val) => this.selectCountry(val) }
            value={this.state.country} />
          <div className="invalid-feedback">
            Please select a valid country.
          </div>
        </div>

        <div className="col-md-4 mb-3">
          <label htmlFor="country">State</label>
          <Select
            options={this.state.optionsState}
            onChange={ (val) => this.selectState(val) }
            value={this.state.state} />
          <div className="invalid-feedback">
            Please provide a valid state.
          </div>
        </div>

        <div className="col-md-4 mb-3">
          <label htmlFor="country">City</label>
          <Select
            options={this.state.optionsCity}
            onChange={ (val) => this.selectCity(val) }
            value={this.state.city} />
          <div className="invalid-feedback">
            Please provide a valid city.
          </div>
        </div>

      </div>
    )
  }
}
