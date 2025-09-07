Set objFSO = CreateObject("Scripting.FileSystemObject")
Set objShell = CreateObject("WScript.Shell")

' Get current directory
strCurrentDir = objFSO.GetAbsolutePathName(".")

' Path to Cerac folder
strCeracPath = strCurrentDir & "\Cerac"

WScript.Echo "Attempting to delete Cerac folder at: " & strCeracPath

' Check if folder exists
If objFSO.FolderExists(strCeracPath) Then
    WScript.Echo "Cerac folder found. Attempting to delete..."
    
    ' Try to delete the folder
    On Error Resume Next
    objFSO.DeleteFolder strCeracPath, True
    If Err.Number <> 0 Then
        WScript.Echo "Failed to delete with FSO. Error: " & Err.Description
        Err.Clear
        
        ' Try with command line
        WScript.Echo "Trying with command line..."
        intResult = objShell.Run("cmd /c rmdir /s /q """ & strCeracPath & """", 0, True)
        If intResult <> 0 Then
            WScript.Echo "Failed to delete with command line. Result: " & intResult
        Else
            WScript.Echo "Successfully deleted with command line"
        End If
    Else
        WScript.Echo "Successfully deleted with FSO"
    End If
    On Error GoTo 0
Else
    WScript.Echo "Cerac folder not found"
End If

' Check if folder still exists
If objFSO.FolderExists(strCeracPath) Then
    WScript.Echo "Cerac folder still exists"
Else
    WScript.Echo "Cerac folder successfully deleted"
End If

WScript.Echo "Script completed"
