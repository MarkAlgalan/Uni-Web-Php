x = input("Ingrese algo ").split()
z = int(input())
x = list(map(int,x))
x = x[0]*x[1]
if (x>=z):
    print(f"{z} 0")
else:
    print(f"{x} {z-x}")


