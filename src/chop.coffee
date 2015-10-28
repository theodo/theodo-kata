module.exports = (int, array = [])->
  interations = 0

  if array.length == 0
    return [-1, interations]

  half = array.length
  while half >= 1
    half = Math.ceil((half - 1) / 2)
    interations++
    # TODO: make it work for > half numbers
    if array[half] == int
      return [half, interations]

  return [-1, interations]
