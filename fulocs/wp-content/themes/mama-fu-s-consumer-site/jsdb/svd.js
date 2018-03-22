/*
Translated from http://stitchpanorama.sourceforge.net/Python/svd.py

Here is the test case (first example) from Golub and Reinsch

a= new Matrix(8,5,[
	  22.,10., 2.,  3., 7.,
	  14., 7.,10.,  0., 8.,
	  -1.,13.,-1.,-11., 3.,
	  -3.,-2.,13., -2., 4.,
	   9., 8., 1., -2., 4.,
	   9., 1.,-7.,  5.,-1.,
	   2.,-6., 6.,  5., 1.,
	   4., 5., 0., -2., 2.]	)

load('svd.js')
let u,w,vt= a.svd()
print(w)

[35.327043465311384, 1.2982256062667619e-15,
 19.999999999999996, 19.595917942265423, 0.0]

// the correct answer is (eigenvalues sorted in descending order)

print([Math.sqrt(1248.),20.,Math.sqrt(384.),0.,0.])

[35.327043465311391, 20.0, 19.595917942265423, 0.0, 0.0]

*/

load('matrix.js')

// Returns U, W, V, where (this= U * W * VT)
Matrix.prototype.svd= function(precision)
{
//Compute the thin SVD from G. H. Golub and C. Reinsch, Numer. Math. 14, 403-420 (1970)
	let prec= precision || 1.e-15 //Math.pow(2,-52) // assumes double prec
	let tolerance= 1.e-64/prec
	if (1.0+prec <= 1.0) throw "Need a bigger precision" 
	if (!(tolerance > 0.0))	 throw "Need a bigger tolerance" 
	let itmax= 50
	let c=0
	let i=0
	let j=0
	let k=0
	let l=0
	
	let u= this.copy()
	let m= this.rows
	
	let n= this.cols
	
	if (m < n) throw "Need more rows than columns"
	
	let e = new Array(n)
	let q = new Array(n)
	for (i=0; i<n; i++) e[i] = q[i] = 0.0
	let v = new Matrix(n,n)
	v.zero()
	
 	function pythag(a,b)
 	{
		a = Math.abs(a)
		b = Math.abs(b)
		if (a > b)
			return a*Math.sqrt(1.0+(b*b/a/a))
		else if (b == 0.0) 
			return a
		return b*Math.sqrt(1.0+(a*a/b/b))
	}

	//Householder's reduction to bidiagonal form

	let f= 0.0
	let g= 0.0	
	let h= 0.0
	let x= 0.0
	let y= 0.0
	let z= 0.0
	let s= 0.0
	
	for (i=0; i < n; i++)
	{	
		e[i]= g
		s= 0.0
		l= i+1
		for (j=i; j < m; j++) 
			s += (u.get(j,i)*u.get(j,i))
		if (s <= tolerance)
			g= 0.0
		else
		{	
			f= u.get(i,i)
			g= Math.sqrt(s)
			if (f >= 0.0) g= -g
			h= f*g-s
			u.set(i,i, f-g)
			for (j=l; j < n; j++)
			{
				s= 0.0
				for (k=i; k < m; k++) 
					s += u.get(k,i)*u.get(k,j)
				f= s/h
				for (k=i; k < m; k++) 
					u.set(k,j, u.get(k,j) + f*u.get(k,i))
			}
		}
		q[i]= g
		s= 0.0
		for (j=l; j < n; j++) 
			s= s + u.get(i,j)*u.get(i,j)
		if (s <= tolerance)
			g= 0.0
		else
		{	
			f= u.get(i,i+1)
			g= Math.sqrt(s)
			if (f >= 0.0) g= -g
			h= f*g - s
			u.set(i,i+1, f-g)
			for (j=l; j < n; j++) e[j]= u.get(i,j)/h
			for (j=l; j < m; j++)
			{	
				s=0.0
				for (k=l; k < n; k++) 
					s += (u.get(j,k)*u.get(i,k))
				for (k=l; k < n; k++) 
					u.set(j,k, u.get(j,k)+(s*e[k]))
			}	
		}
		y= Math.abs(q[i])+Math.abs(e[i])
		if (y>x) 
			x=y
	}
	
	// accumulation of right hand gtransformations
	for (i=n-1; i != -1; i+= -1)
	{	
		if (g != 0.0)
		{
		 	h= g*u.get(i,i+1)
			for (j=l; j < n; j++) 
				v.set(j,i, u.get(i,j)/h)
			for (j=l; j < n; j++)
			{	
				s=0.0
				for (k=l; k < n; k++) 
					s += (u.get(i,k)*v.get(k,j))
				for (k=l; k < n; k++) 
					v.set(k,j,v.get(k,j)+ (s*v.get(k,i)))
			}	
		}
		for (j=l; j < n; j++)
		{
			v.set(i,j, 0.0)
			v.set(j,i, 0.0)
		}
		v.set(i,i, 1.0)
		g= e[i]
		l= i
	}
	
	// accumulation of left hand transformations
	for (i=n-1; i != -1; i+= -1)
	{	
		l= i+1
		g= q[i]
		for (j=l; j < n; j++) 
			u.set(i,j, 0.0)
		if (g != 0.0)
		{
			h= u.get(i,i)*g
			for (j=l; j < n; j++)
			{
				s=0.0
				for (k=l; k < m; k++) s += (u.get(k,i)*u.get(k,j))
				f= s/h
				for (k=i; k < m; k++) u.set(k,j,u.get(k,j) + (f*u.get(k,i)))
			}
			for (j=i; j < m; j++) u.set(j,i, u.get(j,i)/g)
		}
		else
			for (j=i; j < m; j++) u.set(j,i, 0.0)
		u.set(i,i,u.get(i,i) + 1.0)
	}
	
	// diagonalization of the bidiagonal form
	prec= prec*x
	for (k=n-1; k != -1; k+= -1)
	{
		for (let iteration=0; iteration < itmax; iteration++)
		{	// test f splitting
			let test_convergence = false
			for (l=k; l != -1; l+= -1)
			{	
				if (Math.abs(e[l]) <= prec)
				{	test_convergence= true
					break 
				}
				if (Math.abs(q[l-1]) <= prec)
					break 
			}
			if (!test_convergence)
			{	// cancellation of e[l] if l>0
				c= 0.0
				s= 1.0
				let l1= l-1
				for (i =l; i<k+1; i++)
				{	
					f= s*e[i]
					e[i]= c*e[i]
					if (Math.abs(f) <= prec)
						break
					g= q[i]
					h= pythag(f,g)
					q[i]= h
					c= g/h
					s= -f/h
					for (j=0; j < m; j++)
					{	
						y= u.get(j,l1)
						z= u.get(j,i)
						u.set(j,l1, y*c+(z*s))
						u.set(j,i, -y*s+(z*c))
					} 
				}	
			}
			// test f convergence
			z= q[k]
			if (l== k)
			{	//convergence
				if (z<0.0)
				{	//q[k] is made non-negative
					q[k]= -z
					for (j=0; j < n; j++)
						v.set(j,k, -v.get(j,k))
				}
				break  //break out of iteration loop and move on to next k value
			}
			if (iteration >= itmax-1)
				throw 'Error: no convergence.'
			// shift from bottom 2x2 minor
			x= q[l]
			y= q[k-1]
			g= e[k-1]
			h= e[k]
			f= ((y-z)*(y+z)+(g-h)*(g+h))/(2.0*h*y)
			g= pythag(f,1.0)
			if (f < 0.0)
				f= ((x-z)*(x+z)+h*(y/(f-g)-h))/x
			else
				f= ((x-z)*(x+z)+h*(y/(f+g)-h))/x
			// next QR transformation
			c= 1.0
			s= 1.0
			for (i=l+1; i< k+1; i++)
			{	
				g= e[i]
				y= q[i]
				h= s*g
				g= c*g
				z= pythag(f,h)
				e[i-1]= z
				c= f/z
				s= h/z
				f= x*c+g*s
				g= -x*s+g*c
				h= y*s
				y= y*c
				for (j=0; j < n; j++)
				{	
					x= v.get(j,i-1)
					z= v.get(j,i)
					v.set(j,i-1, x*c+z*s)
					v.set(j,i, -x*s+z*c)
				}
				z= pythag(f,h)
				q[i-1]= z
				c= f/z
				s= h/z
				f= c*g+s*y
				x= -s*g+c*y
				for (j=0; j < m; j++)
				{
					y= u.get(j,i-1)
					z= u.get(j,i)
					u.set(j,i-1, y*c+z*s)
					u.set(j,i, -y*s+z*c)
				}
			}
			e[l]= 0.0
			e[k]= f
			q[k]= x
		} 
	}
		
	//vt= transpose(v)
	//return (u,q,vt)
	for (i=0;i<q.length; i++) 
	  if (q[i] < prec) q[i] = 0
	  
	//sort eigenvalues	
	for (i=0; i< n; i++)
	{	 
	//writeln(q)
	 for (j=i-1; j >= 0; j--)
	 {
	  if (q[j] < q[i])
	  {
	//  writeln(i,'-',j)
	   c = q[j]
	   q[j] = q[i]
	   q[i] = c
	   u.swapCols(i,j)
	   v.swapCols(i,j)
	   i = j	   
	  }
	 }	
	}
	
	return [u,q,v]
}

//standard Moore-Penrose pseudoinverse
Matrix.prototype.pinv = function(precision)
{
 let prec= precision || 1.e-15   // assumes double prec
 let [u, w, v] = this.svd(prec)
 let tolerance = prec * Math.max(this.rows,this.cols) * Math.max.apply(null,w)
 
 wp = new Matrix(w.length,w.length)
 wp.zero()

 for (let i=0;i<w.length;i++)
  wp.set(i,i,Math.abs(w[i]) >= tolerance ? 1/w[i] : 0)
 
 return v.times(wp).times(u.transpose())
}

/** Quick SVD-based linear least squares
   basis is an array of functions
   independent is a list of Arrays of length N
   dependent is a list of Arrays of length N
*/
Matrix.pinvFit = function(basis, independent, dependent)
{
 let a = new Matrix(independent.length, basis.length)
 
 for (let i=0; i<independent.length; i++)
  for (let j=0; j<basis.length; j++)
   a.set(i,j,basis[j].apply(basis[j],independent[i]))
 
 let m = (dependent.constructor.name == "Matrix") ? dependent : new Matrix(dependent)
 var solution = a.pinv().times(m)

 return {
   solution: solution,
   basis: basis,
   map: function(coordinate) //maps a tuple from (independent) space to (dependent) space
	 {
	  let coefficients = this.basis.map(function(x) x.apply(x,coordinate))
	  let result = new Array(this.conversion.cols)
	  let x
	  for (let j=0; j< result.length; j++)
	  {
	   x = 0.0
	   for (let i=0; i< coefficients.length; i++)
		x += coefficients[i] * this.conversion.at(i,j)
	   result[j] = x
	  }
	  return result
	 }
	}
 return ret
}

/** Linear least squares, accounting for uncertainties
	basis is an array of functions of arity (P) which returns a number
	independent is a list of Arrays of length N or a N x (P) matrix
	dependent is a list of Arrays of length N or a N x M matrix	
	uncertainty is an Array of length N
	the evaluated interpolation
	
	Read NR 3rd edition, page 794.
*/
Matrix.svdFit = function(basis, independent, dependent, uncertainty)
{
  let prec= 1.e-15   // assumes double prec
  let a = new Matrix(independent.length, basis.length)
 
  function uc(i) {return uncertainty&&uncertainty[i]?uncertainty[i]:1.0}
  
 for (let i=0; i<independent.length; i++)
  for (let j=0; j<basis.length; j++)
   a.set(i,j,basis[j].apply(basis[j],independent[i])/uc(i))
  
 let m = new Matrix(dependent)
 
 for (let i=0; i<m.rows; i++)
  for (let j=0; j<m.cols; j++)
   m.set(i,j,m.at(i,j)/uc(i))
   
// this.basis = basis
 let [u,w,v] = a.svd()
 
 let tolerance = prec * Math.max(a.rows,a.cols) * Math.max.apply(null,w)
 
 let wp = new Matrix(w.length,w.length)
  wp.zero()
 
 for (let i=0;i<w.length;i++)
  wp.set(i,i,Math.abs(w[i]) >= tolerance ? 1/w[i]: 0)

 //the rows of aP are the fit
 let aP = v.times(wp).times(u.transpose())
  
 var solution = v.times(wp).times(u.transpose()).times(m)
 //basis functions are f(X,Y)
 //first column: coefficients to use when transforming X
 //second column: coefficients to use when transforming Y
 
 var covar = new Matrix(v.rows,v.rows)
 //columns of v are the principal axes of the error ellipsoid
 
 for (let j=0; j<covar.rows; j++)
  for (let k=0; k<covar.rows; k++)
  {
   var x = 0.0;
   for (let i=0; i< w.length; i++)
   {
    let z = Math.abs(w[i]) >= tolerance ? 1/w[i]: 0
    x += v.at(j,i) * v.at(k,i) / (z*z)
   }
   covar.set(j,k,x)
  }

 var uncertainty = new Array(v.cols)
 for (let i=0; i<v.cols; i++)
 {
  var x = 0.0
  for (let j=0; j< v.rows; j++)
  {
   x += v.at(i,j) * v.at(i,j)
  } 
  let z = Math.abs(w[i]) >= tolerance ? 1/w[i]: 0
   
  uncertainty[i] = x * z * z
 }
 
 return {
   solution: solution,
   covariance: covar, 
   basis: basis,
   uncertainty:uncertainty,
   evaluate: function(coordinate)
	 {
	  let coefficients = this.basis.map(function(x) x.apply(x,coordinate))
	  let result = new Array(this.solution.cols) //arity of the basis functions
	  let x
	  for (let j=0; j< result.length; j++)
	  {
	   x = 0.0
	   for (let i=0; i< coefficients.length; i++)
		x += coefficients[i] * this.solution.at(i,j)
	   result[j] = x
	  }
	  return result
	 }
	}
 return ret
}

Matrix.polynomialFit = Matrix.fit
Matrix.fit = function(basis, independent, dependent, uncertainty)
{
 if (arguments.length == 2) //fit(order, [[x1,y2],[x2,y2],...]
  return Matrix.polynomialFit(basis,independent)
 else if(arguments.length == 3)
  return Matrix.pinvFit(basis, independent, dependent)
 else if(arguments.length == 4)
  return Matrix.svdFit(basis, independent, dependent, uncertainty)
}

Matrix.testpinv = function()
{
if (typeof writeln == "undefined") writeln = print

a= new Matrix(8,5,[
	  22.,10., 2.,  3., 7.,
	  14., 7.,10.,  0., 8.,
	  -1.,13.,-1.,-11., 3.,
	  -3.,-2.,13., -2., 4.,
	   9., 8., 1., -2., 4.,
	   9., 1.,-7.,  5.,-1.,
	   2.,-6., 6.,  5., 1.,
	   4., 5., 0., -2., 2.]	)

//load('svd.js')
let [u,w,v]= a.svd()

writeln(w)
writeln([Math.sqrt(1248.),20.,Math.sqrt(384.),0.,0.])
writeln()

b = a.pinv()
writeln(b)
writeln(a.times(b))
//print(u,w,vt)
}