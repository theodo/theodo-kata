chai = require 'chai'
expect = chai.expect

chop = require './src/chop'

describe 'Karate Chop', ->
  describe '#chop', ->
    it 'should return an array of int', ->
      expect(chop()).to.be.a('Array');
      expect(chop()[0]).to.be.a('Number');

    it 'should return -1 if the array is empty', ->
      expect(chop(3, [])).to.deep.equal([-1, 0]);

    it 'should return -1 if the element is not in the array', ->
      expect(chop(3, [1])).to.deep.equal([-1, 1]);

    it 'should return 0 if the element is the only element in the array', ->
      expect(chop(1, [1])).to.deep.equal([0, 1]);

    it 'should return [0, 2] if the element is the first element in a 3 elements array', ->
      expect(chop(1, [1, 3, 5])).to.deep.equal([0, 2]);

    it 'should return [1, 1] if the element is the second element in a 3 elements array', ->
      expect(chop(3, [1, 3, 5])).to.deep.equal([1, 1]);
