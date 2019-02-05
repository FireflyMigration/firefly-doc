# Exercise - Cached

1. In **CalcOrderTotalForShipper** add **Debug.WriteLine** to the class constructor.
2. Save changes to Git.
3. Build and test. (notice that every time you change shipper in the **ShowShippers** the Debug line of the constructor show in the **output**)
3. In **ShowShippers** change the call to **CalcOrderTotalForShipper**, and use **Cached<>**.
4. Save changes to Git.
5. Build and test, notice :
   1. You get the same data for all rows.
   2. The Debug message for the constructor Appears only once.
5. In **CalcOrderTotalForShipper** Clear the Where and Zero the value of the two local variables.
6. Save changes to Git.
7. Build and test.

