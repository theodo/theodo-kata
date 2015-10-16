chai = require 'chai'

describe 'Module', ->
  describe '#function', ->
    it 'should return true', ->
      Module.function().should.equals true
