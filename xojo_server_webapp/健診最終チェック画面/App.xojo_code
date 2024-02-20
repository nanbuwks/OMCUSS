#tag Class
Protected Class App
Inherits WebApplication
	#tag Event
		Function HandleURL(Request As WebRequest) As Boolean
		  userofGetParamater=Request.GetParameter("user")
		End Function
	#tag EndEvent


	#tag Property, Flags = &h0
		db As MySQLCommunityServer
	#tag EndProperty

	#tag Property, Flags = &h0
		userofGetParamater As String
	#tag EndProperty


	#tag ViewBehavior
		#tag ViewProperty
			Name="userofGetParamater"
			Visible=false
			Group="Behavior"
			InitialValue=""
			Type="String"
			EditorType="MultiLineEditor"
		#tag EndViewProperty
	#tag EndViewBehavior
End Class
#tag EndClass
